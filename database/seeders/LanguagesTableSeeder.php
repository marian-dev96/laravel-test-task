<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::truncate();

        Language::updateOrCreate(['slug' => 'en'], [
            'name' => 'English',
            'is_default' => true
        ]);

        Language::updateOrCreate(['slug' => 'ru'], [
            'name' => 'Русский'
        ]);
    }
}
