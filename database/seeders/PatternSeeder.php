<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pattern;

class PatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pattern::create([
            'name' => 'Denby'
        ]);

        Pattern::create([
            'name' => 'Lenox'
        ]);

        Pattern::create([
            'name' => 'Noritake'
        ]);

        Pattern::create([
            'name' => 'Pfaltzgraff'
        ]);

        Pattern::create([
            'name' => 'Corning'
        ]);

        Pattern::create([
            'name' => 'Wedgwood'
        ]);
    }
}
