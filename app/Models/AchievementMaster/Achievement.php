<?php namespace app\Models\AchievementMaster;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Achievement
 * @package app\Models\AchievementMaster
 *
 * @property integer $id 一意に特定するID
 * @property string $category 大項目名
 * @property string $subCategory 中項目
 * @property string $name 実績名
 * @property string $content 実績内容
 */
class Achievement extends Model
{
	protected $connection= 'achievement_master';

	public $timestamps = false;
}
