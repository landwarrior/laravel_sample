<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MstUser extends Authenticatable
{
    use Notifiable;

    /** テーブル名 */
    protected $table = 'mst_user';
    /** プライマリキー */
    protected $primaryKey = 'user_cd';
    /** 任意に更新可能とする属性を指定 */
    protected $fillable = [
        'user_cd',
        'name',
        'name_kana',
        'is_admin',
        'remarks',
        'bp_id',
    ];
    /** たぶん、見せたくない項目を定義 */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
