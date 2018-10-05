<?php namespace app\Domain\AchievementMaster;

use app\Models\AchievementMaster\Achievement as AchievementModel;
use Illuminate\Support\Collection;

class AchievementMasterRepository
{
	public function getAll():Collection
	{
		$models = AchievementModel::all();
		return $models->map(function(AchievementModel $achievementModel){
			return $this->_createAchievementMaster($achievementModel);
		});
	}

	/**
	 * i'm factory
	 * @param AchievementModel $achievementModel
	 * @return AchievementMaster
	 */
	private function _createAchievementMaster(AchievementModel $achievementModel)
	{
		return new AchievementMaster(
			$achievementModel->id,
			$achievementModel->category,
			$achievementModel->subcategory,
			$achievementModel->name,
			$achievementModel->content
		);
	}



}