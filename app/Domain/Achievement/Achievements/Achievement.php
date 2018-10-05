<?php namespace app\Domain\Achievements;

class Achievement
{
	/**
	 * @var int
	 */
	private $achievementId;

	/**
	 * @var int
	 */
	private $achievementMasterId;

	/**
	 * @var string
	 */
	private $achievementName;

	/**
	 * @var string
	 */
	private $achievementContent;

	public function __construct($achievementId, $achievementMasterId, $achievementName, $achievementContent)
	{
		$this->achievementId = $achievementId;
		$this->achievementMasterId = $achievementMasterId;
		$this->achievementName = $achievementName;
		$this->achievementContent = $achievementContent;
	}

	public function getAchievementId()
	{
		return $this->achievementId;
	}

	public function getAchievementName()
	{
		return $this->achievementName;
	}

	public function getAchievementContent()
	{
		return $this->achievementContent;
	}
}