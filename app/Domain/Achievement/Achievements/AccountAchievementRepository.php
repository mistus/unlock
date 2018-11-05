<?php namespace app\Domain\Achievements;

use app\Models\Achievement\Achievement as AchievementModel;
use app\Models\AchievementMaster\Achievement as AchievementMasterModel;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use app\Models\Achievement\Account as AccountModel;


class AccountAchievementRepository
{
	public function getAll():Collection
	{
		$accountModels =
			AccountModel::with('achievements')
				->with('achievements.master_achievement')
				->get();

		return $accountModels->map(function (AccountModel $model){
			return $this->_createAchievements($model);
		});
	}

	/**
	 * @param $accountId
	 * @return AccountAchievements
	 */
	public function find($accountId)
	{
		$accountModel = AccountModel::with('achievements.master_achievement')
			->find($accountId);

		return $this->_createAchievements($accountModel);
	}

	/**
	 * i'm factory
	 * @param AccountModel $accountModel
	 * @return AccountAchievements
	 */
	private function _createAchievements(AccountModel $accountModel)
	{
		/** @var EloquentCollection $achievementModels */
		$achievementModels = $accountModel->achievements;

		$achievementCollection = $achievementModels->map(function(AchievementModel $achievementModel){
			$masterAchievementModel = $achievementModel->master_achievement;
			$id = $achievementModel->id;
			$masterId = $masterAchievementModel->id;
			$name = $masterAchievementModel->name;
			$content = $masterAchievementModel->content;
			return new Achievement($id, $masterId, $name, $content);
		});

		return new AccountAchievements(
			new Collection($achievementCollection),
			$accountModel->id,
			$accountModel->nickname
		);
	}

	public function persist(AccountAchievements $accountAchievements)
	{
		////消えた実績を削除する。
		$achieveMasterModels = AchievementMasterModel::all();
		$masterIdCollection =$achieveMasterModels->map(function(AchievementMasterModel $achieveMasterModel){
			return $achieveMasterModel->id;
		});

		//実績に入ってないのを洗い出す
		$deleteList = $masterIdCollection->filter(function(int $id) use ($accountAchievements) {
			return !$accountAchievements->hasAchievement($id);
		})->map(function (int $id) {
			return $id;
		})->toArray();

		//TODO achievement_id => X,  master_id => O
		AchievementModel::where('account_id', $accountAchievements->getAccountId())
			->whereIn('achievement_id', $deleteList)->delete();

		////新しい実績を生成する。
		//updateOrCreate -> Laravel 5.3 ああああぁぁぁぁー
		/** @var EloquentCollection $achievementModels */
		$achievementModels = AchievementModel::where('account_id', $accountAchievements->getAccountId())->get();

		//更新した最新実績を取得する
		$accountAchievementIdCollection = $accountAchievements->getAchievementMasterIdCollection();

		//追加しべきの実績を洗い出す。
		$addAchievementIdCollection = $accountAchievementIdCollection->filter(function (int $id) use ($achievementModels) {
			//DBに入ってないのを絞り込む
			return !$achievementModels->contains(function ($key, AchievementModel $achievementModel) use ($id) {
				return (int)$achievementModel->achievement_id == (int)$id;
			});
		});

		//TODO 一括Insertの方法を検討する。
		//保存する
		$addAchievementIdCollection->each(function(int $id) use ($accountAchievements) {
			$model = new AchievementModel();
			$model->account_id = $accountAchievements->getAccountId();
			$model->achievement_id = $id;
			$model->save();
		});
	}
}