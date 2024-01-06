<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
// use Laravel\Scout\Searchable;

class User extends Model
{

    protected $table = 'users';
    protected $primaryKey = 'userId';

    protected $fillable = [
        'userId',
        'firstName',
        'lastName',
        'email',
        'avatar',
        'totalCoins'
    ];

    //this is used to show total coin of userCoins
    public function userCoins()
    {
        return $this->hasMany('App\Models\UserCoins\UserCoins', 'userId');
        //  return $this->belongsTo('App\Models\Task\Task', 'taskId');

    }

    public function usersJoiningDetails()
    {
        return $this->hasMany('App\Models\UsersJoiningDetails\UsersJoiningDetails','userId');
    }
}
