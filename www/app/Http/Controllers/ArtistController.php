<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Artist::paginate(5);
    }

    public function getArtista($search)
    {
        $result = DB::table('artists')
        ->join('albums', 'artists.id', '=', 'albums.artist_id')
        ->select('artists.*', 'albums.title')
        ->where('artists.name', 'LIKE', '%'.$search.'%' )
        ->get();

        return response()->json(compact('result'));
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

        if ($request) {
            $artist = Artist::create($request->all());
            return response()->json(compact('artist'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        $result = DB::table('artists')
        ->join('albums', 'artists.id', '=', 'albums.artist_id')
        ->select('artists.*', 'albums.title')
        ->where('artists.id', '=', $request )
        ->get();

        return response()->json(compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $artist = Artist::find($request->id);
        $artist->name = $request->name;

        $artist->save();
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
