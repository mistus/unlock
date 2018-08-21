<?php namespace app\Models\Achievement;

use Illuminate\Database\Eloquent\Model;
use app\Models\AchievementMaster\Achievement as MasterAchievementModel;

/**
 * Class Achievement
 * @package app\Models\Achievement
 *
 * @property integer $id アカウント実績一意に特定するID
 * @property integer $account_id アカウント一意に特定するID
 * @property integer $achievement_id 実績マスターデータ一意に特定するID
 *
 * @property-read MasterAchievementModel $master_achievement
 */
class Achievement extends Model
{
	protected $connection= 'achievement';

	public $timestamps = false;

	/**
	 * @return MasterAchievementModel
	 */
	public function master_achievement()
	{
		return $this->hasone(
			MasterAchievementModel::class,
			'id',
			'achievement_id'
		);
	}
}

