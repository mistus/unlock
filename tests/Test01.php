<?php

use League\Csv\Reader;

class Test01 extends \TestCase
{
	public function test01(){

		parent::setUp();

		$repository = new \app\Domain\Achievements\AccountAchievementRepository();


		$AchievementsCollection = $repository->getAll();
		$achievements = $AchievementsCollection->first();

		/** @var \app\Domain\Achievements\AccountAchievements $achievements */
		var_dump('id = '.$achievements->getAccountId());
		var_dump($achievements->getNickName());

		/** @var \app\Domain\Achievements\Achievement $achievement */
		$achievement = $achievements->getAchievements()->first();
		var_dump($achievement->getAchievementName());
		var_dump($achievement->getAchievementContent());
		dd(24);

	}





}