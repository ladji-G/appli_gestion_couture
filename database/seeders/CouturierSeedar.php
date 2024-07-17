<?php

namespace Database\Seeders;

use App\Models\Couturier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouturierSeedar extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Couturier::factory(1)->create();
    }
}
