<?php namespace app\Domain\Achievements;

use Illuminate\Support\Collection;

class Achievements
{
	/**
	 * @var Collection
	 */
	private $achievementCollection;

	/**
	 * @var int
	 */
	private $accountId;

	public function __construct($achievementCollection, $accountId)
	{
		$this->achievementCollection = $achievementCollection;
		$this->accountId = $accountId;
	}

	/**
	 * @return Collection
	 */
	public function getAchievementCollection()
	{
		return $this->achievementCollection;
	}
}