<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '福場凛太郎',
            'email' => 'Rintaro.Fukuba@gmail.com',
            'password' => 'Rintaro.Fukuba'
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト太郎',
            'email' => 'Taro.Test@gmail.com',
            'password' => 'Taro.Test'
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト二郎',
            'email' => 'Jiro.Test@gmail.com',
            'password' => 'Jiro.Test'
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト三郎',
            'email' => 'Saburo.Test@gmail.com',
            'password' => 'Saburo.Test'
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト四郎',
            'email' => 'Shiro.Test@gmail.com',
            'password' => 'Shiro.Test'
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'テスト五郎',
            'email' => 'Goro.Test@gmail.com',
            'password' => 'Goro.Test'
        ];
        DB::table('users')->insert($param);
    }
}
