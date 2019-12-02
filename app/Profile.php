<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    protected $table = 'profiles';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public static function addProfile($user_id) {

        return Profile::create(['user_id' => $user_id]);
    }
}
