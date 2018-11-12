<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for( $i = 0 ; $i < 10; $i++ )
        {
            DB::table('posts')->insert([
                'comment' => "テスト文字列です。",
                'post_id' => NULL,
                'created_at' => time(),
                'updated_at' => time()
            ]);
        }
    }
}
