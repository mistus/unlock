<?php namespace App\Http\Controllers;

use app\Domain\Achievements\AccountAchievementRepository;
use Illuminate\Http\Request;
use app\Models\Achievement\Account as AccountModel;

//TODO Controller名検討
class InformationPageController extends Controller
{
	/**
	 * アカウント一覧ページを取得する
	 * @param Request $request
	 * @return $this
	 */
	public function getList(Request $request)
	{
		$repository = new AccountAchievementRepository();
		$accountAchievementCollection = $repository->getAll();

		return view('/informationPage/InformationIndex')
			->with('accountAchievements',$accountAchievementCollection);
	}

	/**
	 * アカウント詳細ページを取得する
	 * @param Request $request
	 * @param int $accountId
	 * @return $this
	 */
	public function getAccountDetailPage(Request $request, int $accountId)
	{
		$repository = new AccountAchievementRepository();
		$accountAchievement = $repository->find($accountId);

		//$accountAchievementだけでいける？
		return view('/informationPage/AccountDetailPage')
			->with('accountAchievement',$accountAchievement)
			->with('achievements',$accountAchievement->getAchievements());
	}

	/**
	 * 登録ページを取得する
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getRegisterPage(Request $request)
	{
		return view('/informationPage/RegisterPage');
	}

	/**
	 * 新規アカウント登録を行って、詳細ページを返す
	 * @param Request $request
	 * @return $this
	 */
	public function postRegister(Request $request)
	{
		$newAccountId = $this->_createAccount($request->input('nickname'));

		$repository = new AccountAchievementRepository();
		$accountAchievement = $repository->find($newAccountId);

		return view('/informationPage/AccountDetailPage')
			->with('accountAchievement',$accountAchievement)
			->with('achievements',$accountAchievement->getAchievements());
	}

	/**
	 * i'm AccountRepository
	 * TODO move to real repository
	 * @param string $nickname
	 * @return int
	 */
	private function _createAccount(string $nickname)
	{
		$accountModel = new AccountModel();
		$accountModel->nickname = $nickname;
		$accountModel->save();
		return $accountModel->id;
	}
}
