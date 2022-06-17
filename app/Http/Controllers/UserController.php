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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        //
        if ($request->input('user_password') == $request->input('user_repassword')) {
            $data = new User();
            if ($request->file('user_avatar')) {
                $file = $request->file('user_avatar');
                $name = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images/'), $name);
                $data['user_avatar'] = $name;
                $data['user_name'] = $request->input('user_name');
                $data['user_username'] = $request->input('user_username');
                $data['user_email'] = $request->input('user_email');
                $data['user_password'] = Hash::make($request->input('user_password') . 'DzeroK');
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
        if ($request->file('user_avatar')) {
            $file = $request->file('user_avatar');
            $name = date('YmdHi') . $file->getClientOriginalName();
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
        if ($request->file('user_avatar')) {
            $file = $request->file('user_avatar');
            $name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/'), $name);
            $data['user_avatar'] = $name;
            $data['user_name'] = $request->input('user_name');
            $data['user_username'] = $request->input('user_username');
            $data['user_email'] = $request->input('user_email');
            $data['user_password'] = Hash::make($request->input('user_password') . 'DzeroK');
            $data['user_type'] = $request->input('user_type');
            $data['user_exp'] = $request->input('user_exp');
        }
        $checked = User::find($id)->update([
            'user_name' => $request->input('user_name'),
            'user_username' => $request->input('user_username'),
            'user_email' => $request->input('user_email'),
            'user_password' => Hash::make($request->input('user_password') . 'DzeroK'),
            'user_avatar' => $data['user_avatar'],
            'user_type' => $request->input('user_type'),
            'user_exp' => $request->input('user_exp'),
            'user_version' => $version,
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
        return $hash->encodeHex($user->user_version + $salt);
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'user_username' => 'required',
            'user_password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'user_email' : 'user_username';
        if (auth()->attempt(array($fieldType => $input['user_username'], 'password' => Hash::make($input['user_password'] . 'DzeroK')))) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }

    }
}
