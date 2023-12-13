<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orchestra;

class OrchestrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orchestras = orchestra::all();
        return view('orchestras.index')->with('orchestras', $orchestras);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orchestra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $company = $request->input('company');
        $city = $request->input('city');
        $style = $request->input('style');

        Orchestra::create([
            'name' => $name,
            'company' => $company,
            'city' => $city,
            'style' => $style
        ]);

        return redirect('orchestras');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orchestra = Orchestra::findOrfail($id);
        $members = $orchestra->members;
        return view('orchestras.show',['orchestra'=>$orchestra,'members'=>$members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Orchestra::findOrfail($id)->toArray();
        $orchestra = Orchestra::findOrFail($id);
        return view('orchestras.edit', ['orchestra' =>$orchestra]);
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
        $orchestra = Orchestra::findOrFail($id);

        $orchestra->name = $request->input('name');
        $orchestra->company = $request->input('company');
        $orchestra->city = $request->input('city');
        $orchestra->style = $request->input('style');
        $orchestra->save();

        return redirect('orchestras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orchestra= Orchestra::findOrFail($id);
        $orchestra->delete();
        return redirect('orchestras');
    }
}
