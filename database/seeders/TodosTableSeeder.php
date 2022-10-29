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
            'user_id' => 1,
            'tag_id' => 1,
        ];
        Todo::create($param);
        $param = [
            'content' => '宿題する',
            'user_id' => 1,
            'tag_id' => 1,
        ];
        Todo::create($param);
        $param = [
            'content' => '夕飯作る',
            'user_id' => 1,
            'tag_id' => 2,
        ];
        Todo::create($param);
    }

}
