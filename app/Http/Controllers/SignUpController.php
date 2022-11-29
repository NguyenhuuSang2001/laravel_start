<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Cookie;

class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session()->has('username')) {
            $allUser = Users::all();
            return view('showAll', compact('allUser'));
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
        $user = Users::create([
            'username' => $request['username'],
            'password' => md5($request['password'])
        ]);
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
