<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name'=>'pendente',
            'family'=>1
        ]);
        Status::create([
            'name'=>'em andamento',
            'family'=>1
        ]);
        Status::create([
            'name'=>'finalizada',
            'family'=>1
        ]);
        Status::create([
            'name'=>'em serviço',
            'family'=>2
        ]);
        Status::create([
            'name'=>'disponível',
            'family'=>2
        ]);
    }
}
