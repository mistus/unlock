<?php namespace app\Models\Achievement;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * @package app\Models\Achievement
 *
 * @property integer $id 一意に特定するID
 * @property string $nickname
 */
class Account extends Model
{
	protected $connection= 'achievement';

	public $timestamps = false;
}