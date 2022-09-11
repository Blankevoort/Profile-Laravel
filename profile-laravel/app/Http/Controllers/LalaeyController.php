<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lalaey;

class LalaeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lalaeys = Lalaey::all();

        return view('../Admin/Admin', [
            'lalaeys' => $lalaeys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('../Admin/LalaeyControlPanel.LalaeyUplaod');
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
            'Name' => 'required',
            'Lang' => 'required',
            'Type' => 'required',
            'Description' => 'max:500',
            'Image' => 'mimes:png,jpg,jpeg|max:3500',
            'Audio' => 'mimes:mp3|max:7500',
        ]);

        $NewImageName = time() . '-' . $request->Name . '.' . $request->Image->extension();

        $request->Image->move(public_path('Images'), $NewImageName);

        $NewAudioeName = time() . '-' . $request->Name . '.' . $request->Audio->extension();

        $request->Audio->move(public_path('Lalaeys'), $NewAudioeName);

        $lalaey = Lalaey::create([
            'Name' => $request->input('Name'),
            'Lang' => $request->input('Lang'),
            'Type' => $request->input('Type'),
            'Description' => $request->input('Description'),
            'Image_Path' => $NewImageName,
            'Audio_Path' => $NewAudioeName,
        ]);

        return redirect('/lalaey');
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
        $lalaey = Lalaey::find($id);

        return view('Admin/LalaeyControlPanel.LalaeyEdit')->with('lalaey', $lalaey);
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
            'Name' => 'required',
            'Lang' => 'required',
            'Type' => 'required',
            'Description' => 'max:500',
        ]);

        $NewImageName = time() . '-' . $request->Name . '.' . $request->Image->extension();

        $request->Image->move(public_path('Images'), $NewImageName);

        $NewAudioeName = time() . '-' . $request->Name . '.' . $request->Audio->extension();

        $request->Audio->move(public_path('Lalaeys'), $NewAudioeName);

        $lalaey = Lalaey::where('id', $id)->update([
            'Name' => $request->input('Name'),
            'Lang' => $request->input('Lang'),
            'Type' => $request->input('Type'),
            'Description' => $request->input('Description'),
            'Image_Path' => $NewImageName,
            'Audio_Path' => $NewAudioeName,
        ]);

        return redirect('/lalaey');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lalaey $lalaey)
    {
        $lalaey->delete();

        return redirect('/lalaey');
    }
}
