<?php

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class PropertyAnalyticTableSeeder extends SpreadsheetSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/property_analytics.csv';
        $this->tablename = 'property_analytics';
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
