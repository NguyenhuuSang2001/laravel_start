<?php

namespace App\Models;

use Hamcrest\Arrays\IsArray;
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
    public function getAll($keywords = null, $arrSort = null)
    {
        $listUser = new Users();

        // dd($keywords);
        if (isset($keywords)) {
            $listUser = $listUser->where(function ($query) use ($keywords) {
                $query->orWhere('username', 'like', '%' . $keywords . '%');
            });
        }
        if (!empty($arrSort) && is_array($arrSort)) {
            if ($arrSort['type'] === 'asc')
                $arrSort['type'] = 'desc';
            else
                $arrSort['type'] = 'asc';
            $listUser =  $listUser->orderBy($arrSort['by'], $arrSort['type']);
            // dd($arrSort);
        }

        // $listUser = $listUser->get();
        $listUser = $listUser->paginate(5);
        return $listUser;
    }
}
