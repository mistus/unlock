<?php

use League\Csv\Reader;

class Test01 extends \TestCase
{
	public function test01(){
		$csvReader = Reader::createFromPath( self::csv_file_path,'r');
	}
}