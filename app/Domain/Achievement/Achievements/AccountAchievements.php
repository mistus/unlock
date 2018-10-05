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
}
