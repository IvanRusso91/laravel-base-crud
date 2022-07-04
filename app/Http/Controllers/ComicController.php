<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Comic;
class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics= Comic::orderBy('id','desc')->get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
              'title' => 'required | max:50 | min:3',
              'image' => 'required | max:255 | min:10',
              'type' => 'required | max:50 | min:3',
              'description' => 'min:10'
            ],
            [
                'title.required'=> 'il campo title è obbligatorio',
                'title.max'=> 'il campo title deve avere al amssimo :max carratteri',
                'title.max'=> 'il campo title deve avere al amssimo :min carratteri',

                'image.required'=> 'il campo Url è obbligatorio',
                'image.max'=> 'il campo Url deve avere al amssimo :max carratteri',
                'image.max'=> 'il campo Url deve avere al amssimo :min carratteri',

                'type.required'=> 'il campo type è obbligatorio',
                'type.max'=> 'il campo type deve avere al amssimo :max carratteri',
                'type.max'=> 'il campo type deve avere al amssimo :min carratteri',

                'description.min' => 'la descrizione deve avere minimo :min caratteri'


            ],
        );

        $data = $request-> all();
        $new_comic= new Comic();
        $data['slug'] = Str::slug($data['title'], '-');
        $new_comic->fill($data);

        $new_comic->save();

        return redirect()->route('comics.show' , $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic= Comic::find($id);
        if($comic){
            return view('comics.show',compact('comic'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic= Comic::find($id);
        if($comic){
            return view('comics.edit', compact('comic'));

        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {

        $request->validate(
            [
              'title' => 'required | max:50 | min:3',
              'image' => 'required | max:255 | min:10',
              'type' => 'required | max:50 | min:3',
              'description' => 'min:10'
            ],
            [
                'title.required'=> 'il campo title è obbligatorio',
                'title.max'=> 'il campo title deve avere al amssimo :max carratteri',
                'title.max'=> 'il campo title deve avere al amssimo :min carratteri',

                'image.required'=> 'il campo Url è obbligatorio',
                'image.max'=> 'il campo Url deve avere al amssimo :max carratteri',
                'image.max'=> 'il campo Url deve avere al amssimo :min carratteri',

                'type.required'=> 'il campo type è obbligatorio',
                'type.max'=> 'il campo type deve avere al amssimo :max carratteri',
                'type.max'=> 'il campo type deve avere al amssimo :min carratteri',

                'description.min' => 'la descrizione deve avere minimo :min caratteri'


            ],
        );

        $data= $request->all();
        $data['slug']=Str::slug($data['title'], '-');

        $comic->update($data);

        return redirect()->route('comics.show' , $comic);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('fumetto_cancellato', "il Comic $comic->title è stato eliminato correttamente!");

    }
}
