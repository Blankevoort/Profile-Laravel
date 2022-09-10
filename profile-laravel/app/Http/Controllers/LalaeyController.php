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
        $lalaey = new Lalaey;

        $lalaey->Name = $request->input('Name');
        $lalaey->Lang = $request->input('Lang');
        $lalaey->Type = $request->input('Type');
        $lalaey->Description = $request->input('Description');
        $lalaey->save();

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
