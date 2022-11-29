<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Users extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function checkSignUp(Request $request)
    {
        $last = Users::where('username', $request['username'])
            ->get();
        if (count($last) != 0) {
            return false;
        }
        return true;
    }

    public function checkSignIn(Request $request)
    {
        $last = Users::where('username', $request['username'])
            ->get();
        if (count($last) == 0) {
            return false;
        }
        if ($last[0]['password'] === md5($request['password']))
            // dd($last);
            return true;
    }
}
