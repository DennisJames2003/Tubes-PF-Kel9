<?php

namespace Database\Seeders;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('positions')->insert([
            [
                'code' => 'JC',
                'name' => 'Junior Consultant',
                'description' => 'Junior Consultant'
            ],
            [
                'code' => 'SC',
                'name' => 'Senior Consultant',
                'description' => 'Senior Consultant '
            ],
            [
                'code' => 'PC',
                'name' => 'Principal Consultant',
                'description' => 'Principal Consultant'
            ],
        ]);
    }
}
