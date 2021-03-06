<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ad;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ads = Ad::all();

        return view('ad.create', [
            'ads' => $ads
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $this->validate($request, [
            'title' => 'required|max:60',
            'description' => 'required|max:60',
        ]);

        $ad = new Ad();
        $ad->title = $request->get('title');
        $ad->description  = $request->get('description');

        $ad->user()->associate(auth()->user());
        $ad->save();

        // Ad::create($ad);

        return redirect('ads/'.$ad->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ad.show', [
            'ad' => Ad::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::find($id);

        // Check if the auth user posted the very same ad
        if(auth()->user()->id !== $ad->user_id){
            return redirect('ads/'. $ad->id)->with('error', 'Page not authorized');
        }

        return view('ad.edit', [
            'ad' => $ad
        ]);
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
        $data = $request->all();

        $this->validate($request, [
            'title' => 'required|max:60',
            'description' => 'required'
        ]);

        $ad = Ad::find($id);

        $ad->update($data);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::find($id);

        // Check if the auth user posted the very same ad and can delete it
        if(auth()->user()->id !== $ad->user_id){
            return redirect('/')->with('error', 'Page not authorized');
        }

        $ad->delete();

        return redirect('/');
    }
}
