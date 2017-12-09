<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use League\Csv\Statement;


class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        /** @var Reader $csv */
        $csv = Reader::createFromPath(
            database_path('seeds/_data/recipe-data.csv'),
            'r'
        );

        $csv->setHeaderOffset(0); //set the CSV header offset

        //get 25 records starting from the 11th row
        $stmt = new Statement();

        /** @var \League\Csv\ResultSet $recipes */
        $recipes = $stmt->process($csv);

        foreach ($recipes as $recipeArray) {
            DB::table('recipes')->insert($recipeArray);
        }
    }
}
