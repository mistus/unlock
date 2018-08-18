<?php namespace database\seeds;

use Illuminate\Database\Seeder;
use app\Models\AchievementMaster\Achievement;

class AchievementTableSeeder extends Seeder
{
	public function run()
	{
		DB::connection('achievement_master')->table('achievement')->truncate();
//		$data = Utility::csvToAssociativeArrayUseHeader(__DIR__ . '/../csv_file/characters.csv');
		//Csvファイル生成ー
//		foreach ($data as $line) {
//			Character::create($line);
//		Achievement::create($line);
//		}
	}
}

