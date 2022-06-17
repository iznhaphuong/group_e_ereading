<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hashids\Hashids;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
        $hash = new Hashids('', 32);
        $users = User::all();
        $salt = 1122;
        return view('admin.management.user', compact('users', 'hash', 'salt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $data = new User();
        if ($request->file('user_avatar')){
            $file = $request->file('user_avatar');
            $name = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/'), $name);
            $data['user_avatar'] = $name;
            $data['user_name'] = $request->input('user_name');
            $data['user_username'] = $request->input('user_username');
            $data['user_email'] = $request->input('user_email');
            $data['user_password'] = Hash::make($request->input('user_password') . 'DzeroK');
            $data['user_type'] = $request->input('user_type');
            $data['user_exp'] = $request->input('user_exp');
        }
        $checked = $data->save();
        if ($checked) {
            return redirect()->route('user.index')->with('success', 'Thêm thành công');
        } else {
            return redirect()->route('user.index')->with('error', 'Thêm thất bại');
        }
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
