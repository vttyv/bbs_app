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
                'user_id' => '1',
                'comment' => "テスト文字列です。",
                'article_id' => '1',
                'post_id' => NULL,
                'fixed_id' => substr(md5('168.0.0.0'), 0, 7),
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }
    }
}
