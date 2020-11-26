<?php

use Illuminate\Database\Seeder;
use App\Export;

class ExportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 500;
        factory(Export::class, $count)->create();

    }
}
