<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Cookie;

class SignUpController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortType = 'asc';
        (isset($request['sort-type']) && $request['sort-type'] === 'asc') ? ($sortType = 'desc') : '';
        $sortBy = isset($request['sort-by']) ? $request['sort-by'] : 'created_at';
        $sortBy = ($sortBy == 'email' ? 'username' : $sortBy);
        $arrSort = [
            'by' => $sortBy,
            'type' => $sortType
        ];
        if (session()->has('username')) {
            if (isset($request->keywords))
                $allUser = $this->users->getAll($request->keywords, $arrSort);
            else
                $allUser = $this->users->getAll(null, $arrSort);
            return view('showAll', compact('allUser', 'sortType'));
        }
        return redirect(route('signIn.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->has('username'))
            return redirect(route('signUp.index'));
        if (Cookie::has('username')) {
            session()->put('username', Cookie::get('username'));
            return redirect(route('signUp.index'));
        }

        return view('signUp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request['logout'])) {
            session()->flush();
            Cookie::expire('username');
            return redirect()->back();
        }
        $user = new Users();
        if (!$user->checkSignUp($request)) {
            return redirect()->back()->with('msg', $request['username']);

            // return (view('signUp', compact('msg')));
        }
        // dd($request);

        $user = Users::create([
            'username' => $request['username'],
            'password' => md5($request['password'])
        ]);

        // $user['username'] = $request['username'];
        // $user['password'] = md5($request['password']);
        // $user->save();
        // dd($user);
        session()->put('username', $request->username);
        Cookie::queue('username', $request->username);
        return redirect(route('signUp.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
