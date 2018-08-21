<?php namespace database\seeds;

use Illuminate\Database\Seeder;
use app\Models\AchievementMaster\Achievement as AchievementModel;

class AchievementTableSeeder extends Seeder
{
	const CATEGORY = 0;
	const SUBCATEGORY = 1;
	const ACHIEVEMENT_NAME = 2;
	const ACHIEVEMENT_CONTENT = 3;

	public function run()
	{
		\DB::connection('achievement_master')->table('achievements')->truncate();

		$csvFile = fopen("database/seeds/CsvFile/achievement-master.csv", "r");

		//ReadFirstLine
		fgetcsv($csvFile, "r");

		//読み切るまでに実行する
		while (($CsvLine = fgetcsv($csvFile, "r")) != false) {
			$achievementModel = new AchievementModel();
			$achievementModel->category = $CsvLine[self::CATEGORY];
			$achievementModel->subCategory = $CsvLine[self::SUBCATEGORY];
			$achievementModel->name = $CsvLine[self::ACHIEVEMENT_CONTENT];
			$achievementModel->content = $CsvLine[self::ACHIEVEMENT_CONTENT];
			$achievementModel->save();
		}
	}
}

