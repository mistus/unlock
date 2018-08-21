<?php namespace database\seeds;

use Illuminate\Database\Seeder;
use app\Models\AchievementMaster\Achievement as AchievementModel;

class AchievementTableSeeder extends Seeder
{
	const ID = 0;
	const CATEGORY = 1;
	const SUBCATEGORY = 2;
	const ACHIEVEMENT_NAME = 3;
	const ACHIEVEMENT_CONTENT = 4;

	public function run()
	{
		\DB::connection('achievement_master')->table('achievements')->truncate();

		$csvFile = fopen("database/seeds/CsvFile/achievement-master.csv", "r");

		//ReadFirstLine
		fgetcsv($csvFile, "r");

		//読み切るまでに実行する
		while (($CsvLine = fgetcsv($csvFile, "r")) != false) {
			$achievementModel = new AchievementModel();
			$achievementModel->id = $CsvLine[self::ID];
			$achievementModel->category = $CsvLine[self::CATEGORY];
			$achievementModel->subCategory = $CsvLine[self::SUBCATEGORY];
			$achievementModel->name = $CsvLine[self::ACHIEVEMENT_NAME];
			$achievementModel->content = $CsvLine[self::ACHIEVEMENT_CONTENT];
			$achievementModel->save();
		}
	}
}

