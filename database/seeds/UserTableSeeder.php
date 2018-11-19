<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  user's seed.
        for( $i = 0; $i < 5; $i++ ){
            DB::table('users')->insert([
                'name' => 'のーねーむ'.$i.'世',
                'email' => "sample'.$i.'@user.com",
                'email_verified_at' => NULL,
                'password' => "sampleuser",
            ]);

            // article's seed.
            DB::table('articles')->insert([
                'title' => 'タイトル',
                'descript' => '説明文',
                'image_thumb' => 'none',
                'user_id' => intval($i /3 + 1),
            ]);
        }
    }
}
