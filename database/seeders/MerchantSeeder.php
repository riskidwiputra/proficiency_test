<?php

namespace Database\Seeders;

use App\Models\merchants;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        merchants::factory()
            ->count(2)
            ->create();
    }
}
