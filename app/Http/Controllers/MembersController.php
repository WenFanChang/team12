<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Orchestra;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::all();
        return view('Members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orchestras = Orchestra::orderBy('orchestras.id', 'asc')->pluck('orchestras.name', 'orchestras.id');
        return view('members.create', ['orchestras' =>$orchestra, 'orchestraSelected' => null]);
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
        $oid = $request->input('oid');
        $position = $request->input('position');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $year = $request->input('year');
        $age = $request->input('age');
        $nationality = $request->input('nationality');

        $member = Member::create([
            'name'=>$name,
            'oid'=>$oid,
            'position'=>$position,
            'height'=>$height,
            'weight'=>$weight,
            'year'=>$year,
            'age'=>$age,
            'nationality'=>$nationality]);
        return redirect('members');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view ('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $orchestras = Orchestra::orderBy('orchestras.id', 'asc')->pluck('orchestras.name', 'orchestras.id');
        $selected_tags = $member->orchestra->id;
        return view('members.edit', ['member' =>$member, 'orchestras' => $orchestras, 'orchestraSelected' => $selected_tags]);
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
        $member = Member::findOrFail($id);
        $member->name = $request->input('name');
        $member->oid = $request->input('oid');
        $member->position = $request->input('position');
        $member->height = $request->input('height');
        $member->weight = $request->input('weight');
        $member->year = $request->input('year');
        $member->age = $request->input('age');
        $member->nationality = $request->input('nationality');
        $member->save();
        return redirect('members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect('members');
    }
}
