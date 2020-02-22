<?php

use App\ApplicationCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApplicationCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = collect(['first time', 'renewal']);

        $categoryNames->transform(static function ($categoryName) {
            ApplicationCategory::create(['name' => $categoryName, 'slug' => Str::slug($categoryName)]);
        });

        $this->command->info("[{$categoryNames->count()}] application categories seeded.");
    }
}
