<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Album;
use App\Artist;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Album::paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getURLImageAlbum($id)
    {
        $album = Album::find($id);
        $url = Storage::disk('minio')->url($album->img_capa);
        $album->img_capa = $url;


        return response()->json(compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $album= new Album;
        $album->artist_id = $request->artist_id ;
        $album->title = $request->title;

        $album->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAlbumsDesc($search)
    {
        $result = DB::table('albums')
        ->join('artists', 'albums.artist_id', '=', 'artists.id')
        ->select('albums.*', 'artists.name')
        ->where('artists.name', 'LIKE', '%'.$search.'%')
        ->orWhere('albums.title', 'LIKE', '%'.$search.'%')
        ->orderByDesc('albums.title')
        ->get();

        return response()->json(compact('result'));
    }

    public function getAlbumsAsc($search)
    {
        $result = DB::table('albums')
        ->join('artists', 'albums.artist_id', '=', 'artists.id')
        ->select('albums.*', 'artists.name')
        ->where('artists.name', 'LIKE', '%'.$search.'%')
        ->orWhere('albums.title', 'LIKE', '%'.$search.'%')
        ->orderBy('albums.title')
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

        if ($request) {

            $img_capa = Storage::disk('minio')->put('', $request->file);
            $request->merge(['path' => $img_capa]);

            $album = Album::find($request->id);
            $album->artist_id = $request->artist_id ;
            $album->title = $request->title;
            $album->img_capa = $img_capa;

            $album->save();
            return 'Album Atualizado';
        }
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
