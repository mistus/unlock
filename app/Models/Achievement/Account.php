<?php namespace app\Models\Achievement;

use Illuminate\Database\Eloquent\Model;
use app\Models\Achievement\Achievement as AchievementModel;

/**
 * Class Account
 * @package app\Models\Achievement
 *
 * @property integer $id 一意に特定するID
 * @property string $nickname
 *
 * @property-read AchievementModel $achievements
 */
class Account extends Model
{
	protected $connection= 'achievement';

	public $timestamps = false;

	public function achievements()
	{
		return $this->hasMany(
			AchievementModel::class,
			'account_id',
			'id'
		);
	}
}