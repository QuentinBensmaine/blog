<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'content' => 'Super article !',
            'user_id' => 4,
            'post_id' => 7,
        ]);   
        DB::table('users')->insert([
            'content' => 'Tout à fait d\'accord !',
            'user_id' => 4,
            'post_id' => 7,
        ]);   
        DB::table('users')->insert([
            'content' => 'Super article !',
            'user_id' => 4,
            'post_id' => 8,
        ]);    
    }
}
