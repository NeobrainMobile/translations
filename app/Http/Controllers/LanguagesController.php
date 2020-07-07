<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use View;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $languages = Language::all();

        $data = [
          'languages' => $languages
        ];

        return View::make('languages.index',$data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('languages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'language'=>'required',
          'code'=>'required'
      ]);

      $language = new Language([
          'language' => $request->get('language'),
          'code' => $request->get('code')
      ]);
      $language->save();
      return redirect('/languages')->with('success', 'Language saved!');

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
      $language = Language::find($id);
      return view('languages.edit', compact('language'));
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
      $request->validate([
         'language'=>'required',
         'code'=>'required',
     ]);

     $language = Language::find($id);
     $language->language =  $request->get('language');
     $language->code = $request->get('code');
     $language->save();

     return redirect('/languages')->with('success', 'Languages updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $language = Language::find($id);
      $language->delete();

      return redirect('/languages')->with('success', 'Language deleted!');
    }
}
