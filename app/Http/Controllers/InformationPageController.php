<?php namespace App\Http\Controllers;

use app\Domain\Achievements\AccountAchievementRepository;
use Illuminate\Http\Request;
use app\Models\Achievement\Achievement as AchievementModel;

class InformationPageController extends Controller
{
	public function getList(Request $request)
	{
		$repository = new AccountAchievementRepository();
		$accountAchievementCollection = $repository->getAll();

		return view('/informationPage/InformationIndex')
			->with('accountAchievements',$accountAchievementCollection);
	}

	public function getAccountDetailPage(Request $request, int $accountId)
	{
		$repository = new AccountAchievementRepository();
		$accountAchievement = $repository->find($accountId);

		//$accountAchievementだけでいける？
		return view('/informationPage/AccountDetailPage')
			->with('accountAchievement',$accountAchievement)
			->with('achievements',$accountAchievement->getAchievements());

//		return view('/informationPage/AccountDetailPage')
//			->with('accountAchievement',$accountAchievement);
	}
}