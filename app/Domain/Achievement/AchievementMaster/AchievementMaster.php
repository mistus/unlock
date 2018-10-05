<?php namespace app\Domain\AchievementMaster;

class AchievementMaster
{
	/**
	 * @var int
	 */
	private $achievementMasterId;

	/**
	 * @var string
	 */
	private $category;

	/**
	 * @var string
	 */
	private $subcategory;

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $content;

	public function __construct(int $achievementMasterId,
		string $category,
		string $subcategory,
		string $achievementName,
		string $achievementContent
	) {
		$this->achievementMasterId = $achievementMasterId;
		$this->category = $category;
		$this->subcategory = $subcategory;
		$this->name = $achievementName;
		$this->content = $achievementContent;
	}

	public function getId()
	{
		return $this->achievementMasterId;
	}

	public function getCategory()
	{
		return $this->category;
	}

	public function getSubcategory()
	{
		return $this->subcategory;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getContent()
	{
		return $this->content;
	}
}
