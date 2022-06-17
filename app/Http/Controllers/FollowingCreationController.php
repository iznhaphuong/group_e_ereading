<?php

namespace App\Http\Controllers;

use App\Models\Creation;
use App\Models\FollowingCreation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use  Illuminate\Database\Eloquent\Builder;

class FollowingCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $controller = new Controller();
        $UUID = $controller->getUUID();
        $user = User::find($UUID);
        $PER_PAGE = 4;

        // Chi search
        if ($request->input('q') && $request->sort == null) {
            $keyword = $request->input('q');
            $creations = $user->following_creations()
                ->where('creations.name', 'like', '%' . $keyword . '%')
                ->paginate($PER_PAGE);

            return view('user.creation.following')
                ->with('creations', $creations)
                ->with('keyword', $keyword);
        }
        //Sort 
        else if ($sort = $request->sort) {
            $creations = $user->following_creations();
            if ($keyword = $request->input('q')) {
                echo $keyword;
                $creations = $creations = $user->following_creations()
                    ->where('creations.name', 'like', '%' . $keyword . '%');
            }
            switch ($sort) {
                case 1:
                    $creations = $creations->orderBy('id')->paginate($PER_PAGE);
                    break;
                case 2:
                    $creations = $creations->orderBy('name')->paginate($PER_PAGE);
                    break;
                case 3:
                    $creations = $creations->orderBy('name', 'DESC')->paginate($PER_PAGE);
                    break;
            }
            if ($keyword) {
                return view('user.creation.following')
                    ->with('creations', $creations)
                    ->with('sort', $sort)
                    ->with('keyword', $keyword);
            } else {
                return view('user.creation.following')
                    ->with('creations', $creations)
                    ->with('sort', $sort);
            }
        }
        //Mac dinh
        else {
            $creations = $user->following_creations()->paginate($PER_PAGE);
            return view('user.creation.following')->with('creations', $creations);
        }
    }

    public function searchAjax(Request $request)
    {
        $controller = new Controller();
        $UUID = $controller->getUUID();
        $creations = DB::table('following_creations')
            ->join('creations', 'creations.id', '=', 'creation_id')
            ->where([
                ['user_id', '=',  $UUID],
                ['creations.name', 'like', '%' . $request->keyword . '%']
            ])->get();
        return $creations;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->UUID;
        $creation_id = $request->creation_id;
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
