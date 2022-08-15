<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MovieCreateRequest;
use Datatables;

class MovieController extends Controller
{

    public function index()
    {

       $genres = Genre::pluck('name','id');
       $types  = Type::pluck('name','id');

       return view('movies.index',compact('genres','types'));


    }

    public function movieDatatable(Request $request)
    {

        $movies = Movie::select('id', 'name','synopsis','price')
                ->orderBy('id','desc');

        if(request()->ajax()) {
            return datatables()->of($movies)
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                return '<div class="btn-group">
                              <button class="btn btn-sm btn-primary" data-id="'.
                              $row['id'].'" id="btn_UpdateMovie">Update</button>

                              <button class="btn btn-sm btn-danger" data-id="'.
                              $row['id'].'" id="btn_DeleteMovie">Delete</button>
                        </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
        }

    }

    public function moviedisplay(Request $request)
    {
        return response()->json(['movie'=>Movie::find($request->movie_id)]);
    }


    public function movieUpgradeAjax(Request $request)
    {

        Movie::where('id', $request->id)
        ->update(array('name'      => $request->name,
                       'genre_id'  => $request->genre,
                       'type_id'   =>$request->type,
                       'date_release' =>$request->date,
                       'price'     =>$request->price,
                       'synopsis'  =>$request->synopsis));

       return response()->json(['status'=>0, 'msg'=>'Movie updated']);
    }

    public function store(MovieCreateRequest $request)
    {
        $movie = new Movie();
        $movie->genre_id     = $request->genre;
        $movie->type_id      = $request->type;
        $movie->name         = $request->name;
        $movie->date_release = $request->date;
        $movie->synopsis     = $request->synopsis;
        $movie->price        = $request->price;
        $movie->save();
        return response()->json(['status'=>0, 'msg' => '  The Movie successfully recorded !']);
    }


    public function movieDeleteAjax(Request $request)
    {
        $movie_id = $request->movie_id;
        $query = Movie::find($movie_id)->delete();

        return response()->json(['status'=>1, 'msg'=>'Movie deleted']);

    }

}
