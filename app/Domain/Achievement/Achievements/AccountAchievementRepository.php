<?php namespace app\Domain\Achievements;

use app\Models\Achievement\Achievement as AchievementModel;
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
}