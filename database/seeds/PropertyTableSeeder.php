<?php

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
use Webpatser\Uuid\Uuid;

class PropertyTableSeeder extends SpreadsheetSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/property.csv';
        $this->tablename = 'properties';
        $this->defaults = ['guid' => Uuid::generate()->string];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::disableQueryLog();
        parent::run();
    }
}
