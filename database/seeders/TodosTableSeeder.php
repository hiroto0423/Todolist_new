<?php

namespace Database\Seeders;
use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => '洗濯する',
        ];
        Todo::create($param);
        $param = [
            'content' => '宿題する',
        ];
        Todo::create($param);
        $param = [
            'content' => '夕飯作る',
        ];
        Todo::create($param);
    }

}
