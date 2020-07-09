<?php

use Illuminate\Database\Seeder;

class MstUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // テーブルのクリア
      DB::table('mst_user')->truncate();
      // 初期データ用意（列名をキーとする連想配列）
      $mst_user = [
          ['user_cd' => 'homestead',
           'name' => 'homestead',
           'name_kana' => 'homestead',
           'password' => Hash::make('homestead'),
           'is_admin' => 1],
      ];

      // 登録
      foreach($mst_user as $user) {
          \App\MstUser::create($user);
      }
    }
}
