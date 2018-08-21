<?php namespace app\Domain\Achievements;

use app\Models\AchievementMaster\Achievement as MasterAchievementModel;
use app\Models\Achievement\Achievement as AchievementModel;
//use app\Domain\Achievements\Achievement;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class AchievementsRepository
{
	/**
	 * @param $accountId
	 * @return Achievements
	 */
	public function find($accountId)
	{
		$achievementModelCollection =
			AchievementModel::whereAccountId($accountId)
				->with('master_achievement')
			->get();
		return $this->_createAchievements($achievementModelCollection, $accountId);
	}

	/**
	 * i'm factory
	 * @param EloquentCollection $achievementModels
	 * @param $accountId
	 * @return Achievements
	 */
	private function _createAchievements(EloquentCollection $achievementModels, $accountId)
	{
		$achievementCollection = $achievementModels->map(function (AchievementModel $achievementModel) {
			/** @var MasterAchievementModel $masterAchievementModel */
			$masterAchievementModel = $achievementModel->master_achievement;

			$id = $achievementModel->id;
			$masterId = $masterAchievementModel->id;
			$name = $masterAchievementModel->name;
			$content = $masterAchievementModel->content;

			return new Achievement($id, $masterId, $name, $content);
		});

		return new Achievements(
			new Collection($achievementCollection),
			$accountId
		);
	}
}