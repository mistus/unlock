<?php namespace App\Http\Controllers;

use app\Domain\Achievements\AccountAchievementRepository;
use Illuminate\Http\Request;
use app\Models\Achievement\Achievement as AchievementModel;

class InformationPageController extends Controller
{

	public function getIndex(){
		return '1233456';
	}


	public function getList(Request $request)
	{
		$repository = new AccountAchievementRepository();
		$accountAchievementCollection = $repository->getAll();

		return view('/informationPage/InformationIndex')
			->with('accountAchievements',$accountAchievementCollection);
	}
}