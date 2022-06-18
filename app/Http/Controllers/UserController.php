<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hashids\Hashids;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        //
        if ($request->input('password') == $request->input('repassword')) {
            $data = new User();
            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                $name = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images/'), $name);
                $data['avatar'] = $name;
                $data['name'] = $request->input('name');
                $data['username'] = $request->input('username');
                $data['email'] = $request->input('email');
                $data['password'] = $request->input('password');
            }
            $checked = $data->save();
            if ($checked) {
                return redirect()->route('login')->with('success', 'Thêm thành công');
            } else {
                return redirect()->route('register')->with('error', 'Thêm thất bại');
            }
        } else {
            return redirect()->route('register')->with('error', 'Mật khẩu không khớp');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $data = new User();
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/'), $name);
            $data['avatar'] = $name;
            $data['name'] = $request->input('name');
            $data['username'] = $request->input('username');
            $data['email'] = $request->input('email');
            $data['password'] = $request->input('password');
            $data['type'] = $request->input('type');
            $data['exp'] = $request->input('exp');
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        //
        $hash = new Hashids('', 32);
        $data = new User();
        $salt = 1122;
        $id = $hash->decodeHex($request->input('id')) - $salt;
        $version = $hash->decodeHex($request->input('version')) - $salt;
        $version++;
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/'), $name);
            $data['avatar'] = $name;
            $data['name'] = $request->input('name');
            $data['username'] = $request->input('username');
            $data['email'] = $request->input('email');
            $data['password'] = $request->input('password');
            $data['type'] = $request->input('type');
            $data['exp'] = $request->input('exp');
        }
        $checked = User::find($id)->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'avatar' => $data['avatar'],
            'type' => $request->input('type'),
            'exp' => $request->input('exp'),
            'version' => $version,
        ]);
        if ($checked) {
            return redirect()->route('user.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('user.index')->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        //
        $hash = new Hashids('', 32);
        $salt = 1122;
        $id = $hash->decodeHex($request->input('id')) - $salt;
        $checked = User::find($id)->delete();
        if ($checked) {
            return redirect()->route('user.index')->with('success', 'Xóa thành công');
        } else {
            return redirect()->route('user.index')->with('error', 'Xóa không thành công');
        }

    }

    public function getUser($id)
    {
        //
        $hash = new Hashids('', 32);
        $salt = 1122;
        $user = User::find($hash->decodeHex($id) - $salt);
        return $user;
    }

    public function getVersion($id)
    {
        $hash = new Hashids('', 32);
        $id = $hash->decodeHex($id);
        $salt = 1122;
        $id = $id - $salt;
        $user = User::find($id);
        return $hash->encodeHex($user->version + $salt);
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }

    }
}
