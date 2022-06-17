<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Hashids\Hashids;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        //
        $hash = new Hashids('', 32);
        $categories = Category::all();
        $salt = 1122;
        return view('admin.management.category', compact('categories', 'hash', 'salt'));
    }


    public function create(Request $request)
    {
        //

    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $checked = Category::create([
            'name' => $data['name'],
        ]);
        if ($checked) {
            return redirect()->route('category.index')->with('success', 'Thêm thành công');
        } else {
            return redirect()->route('category.index')->with('error', 'Thêm thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $hash = new Hashids('', 32);
        $salt = 1122;
        $name = $request->input('name');
        $version = $hash->decodeHex($request->input('version')) - $salt;
        $version++;
        $id = $hash->decodeHex($id) - $salt;
        $checked = Category::find($id)->update([
            'name' => $name,
            'version' => $version,
        ]);
        if ($checked) {
            return redirect()->route('category.index')->with('success', 'Cập nhật thành công');
        } else {
            return redirect()->route('category.index')->with('error', 'Cập nhật thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        //
//        $id = $request->id;
        $hash = new Hashids('', 32);
        $salt = 1122;
        $id = $hash->decodeHex($request->input('id')) - $salt;
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('success', 'Xóa thành công');
    }

    public function restore($id)
    {
        //
        Category::withTrashed()->find($id)->restore();
        return redirect()->route('category.index')->with('success', 'Khôi phục thành công');
    }

    public function restoreAll()
    {
        //
        Category::onlyTrashed()->restore();
        return redirect()->route('category.index')->with('success', 'Khôi phục thành công');
    }

    public function forceDelete($id)
    {
        //
        Category::withTrashed()->find($id)->forceDelete();
        return redirect()->route('category.index')->with('success', 'Xóa vĩnh viễn thành công');
    }

    public function getCategory($id)
    {
        //
        $hash = new Hashids('', 32);
        $salt = 1122;
        $category = Category::find($hash->decodeHex($id) - $salt);
        return $category;
    }

    public function getVersion($id) {
        $hash = new Hashids('', 32);
        $id = $hash->decodeHex($id);
        $salt = 1122;
        $id = $id - $salt;
        $category = Category::find($id);
        return $hash->encodeHex($category->version + $salt);
    }
}
