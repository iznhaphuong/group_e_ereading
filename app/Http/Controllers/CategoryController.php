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
        return view('admin.management.category', compact('categories', 'hash'));
    }


    public function create(Request $request)
    {
        //

    }

    public function store(Request $request)
    {
        //
        $hash = new Hashids('', 32);
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
        $name = $request->input('name');
        $version = $hash->decodeHex($request->input('version'));
        $version++;
        $id = $hash->decodeHex($id);
        $checked = Category::find($id)->update([
            'name' => $name,
            'version' => $version,
        ]);
//        if ($checked) {
//            return redirect()->route('category.index')->with('success', 'Cập nhật thành công');
//        } else {
//            return redirect()->route('category.index')->with('error', 'Cập nhật thất bại');
//        }
        $check = "";
        if (checked) {
            $check = 'success';
        } else {
            $check = 'error';
        }
        return $check;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //
//        $id = $request->id;
        $hash = new Hashids('', 32);
        Category::find($hash->decodeHex($id))->delete();
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
        $category = Category::find($hash->decodeHex($id));
        return $category;
    }

    public function getVersion($id) {
        $hash = new Hashids('', 32);
        $id = $hash->decodeHex($id);
        $category = Category::find($id);
        return $hash->encodeHex($category->version);
    }
}
