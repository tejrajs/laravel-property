<?php

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class AnalyticTableSeeder extends SpreadsheetSeeder
{
    public function __construct()
    {
        $this->file = '/database/seeds/csvs/analytic_types.csv';
        $this->tablename = 'analytic_types';
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
