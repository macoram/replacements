<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PieceType;

class PieceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PieceType::create([
            'name' => 'dinner plate'
        ]);

        PieceType::create([
            'name' => 'teacup'
        ]);

        PieceType::create([
            'name' => 'serving plate'
        ]);

        PieceType::create([
            'name' => 'cereal bowl'
        ]);

        PieceType::create([
            'name' => 'soup bowl'
        ]);

        PieceType::create([
            'name' => 'salad plate'
        ]);

        PieceType::create([
            'name' => 'serving bowl'
        ]);

        PieceType::create([
            'name' => 'butter dish'
        ]);

        PieceType::create([
            'name' => 'teapot'
        ]);

        PieceType::create([
            'name' => 'gravy boat'
        ]);
    }
}
