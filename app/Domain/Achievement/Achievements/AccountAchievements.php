<?php namespace app\Domain\Achievements;

use Illuminate\Support\Collection;

class AccountAchievements
{
	/**
	 * 実績コレクション
	 * @var Collection
	 */
	private $achievementCollection;

	/**
	 * @var int
	 */
	private $accountId;

	/**
	 * @var string
	 */
	private $niceName;

	public function __construct(Collection $achievementCollection, int $accountId, string $nickName)
	{
		$this->achievementCollection = $achievementCollection;
		$this->accountId = $accountId;
		$this->niceName = $nickName;
	}

	public function getAccountId()
	{
		return $this->accountId;
	}

	public function getNickName()
	{
		return $this->niceName;
	}

	public function getAchievements()
	{
		return $this->achievementCollection;
	}

	public function hasAchievement(int $masterId)
	{
		return $this->achievementCollection->contains(function($key, Achievement $achievement) use ($masterId) {
			return $achievement->getMasterId() === $masterId;
		});
	}

	public function updateByAchievementMasterIds(array $masterAchievementIds)
	{
		//なくなったのを削除する。
		$this->achievementCollection = $this->achievementCollection->reject(function(Achievement $achievement) use ($masterAchievementIds){
			//更新実績リストに入ってない実績を削除する。
			$masterId = $achievement->getMasterId();
			return !in_array($masterId, $masterAchievementIds);
		});

		//新しい実績を追加する。
		foreach ($masterAchievementIds as $masterAchievementId){
			$isAchievementExist = $this->hasAchievement($masterAchievementId);
			if(!$isAchievementExist){
				//登録してない実績を登録する。
				$this->_addNewAchievement($masterAchievementId);
			}
		}
	}

	private function _addNewAchievement(int $masterAchievementId)
	{
		//TODO MasterIDでは名前と実績内容知らない && データ更新にこれら入らないのため、これの検討する必要かも。とりあえず知らないと入力しておく。
		$newAchievement = new Achievement(
			null,
			$masterAchievementId,
			'知らない',
			'知らない'
		);

		$this->achievementCollection[] = $newAchievement;
	}

	public function getAchievementMasterIdCollection(): Collection
	{
		return $this->achievementCollection->map(function(Achievement $achievement){
			return $achievement->getMasterId();
		})->reject(null);
	}
}
