<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Orchestra;
use App\Http\Requests\CreateMemberRequest;
use Illuminate\Http\Request;

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
        $members = Member::paginate(25);
        $positions = Member::allPositions()->pluck('members.position', 'members.position');

        return view('Members.index', ['members' => $members, 'positions'=>$positions, 'selectedPosition'=>null]);

    }

    public function senior()
    {
        //從model拿特定條件下的資料
        $members = Member::senior()->paginate(25);

        $positions = Member::allPositions()->pluck('members.position', 'members.position');
        //把資料送給view
    
        return view('Members.index', ['members' => $members, 'positions'=>$positions, 'selectedPosition'=>null]);

    }

    public function position(Request $request)
    {
        $members = Member::position($request->input('pos'))->paginate(25);
        $positions = Member::allPositions()->pluck('members.position', 'members.position');
        $selectedPosition = $request->input('pos');
        return view('members.index', ['members' => $members, 'positions'=>$positions, 'selectedPosition'=>$selectedPosition]);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orchestras = Orchestra::orderBy('orchestras.id', 'asc')->pluck('orchestras.name', 'orchestras.id');
        return view('members.create', ['orchestras'=>$orchestras, 'orchestraSelected' =>null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMemberRequest $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:2|max:191',
            'oid' => 'required',
            'position' => 'required|string|min:2|max:191',
            'height' => 'nullable',
            'weight' => 'nullable',
            'year' => 'required|numeric|min:1|max:50',
            'age' => 'required|numeric|min:16|max:70',
            'nationality' => 'required|string|min:2|max:191',               
            ], // 驗證規則
            [
             
            "name.required" => "團員名稱 為必填",
            "name.min" => "團員名稱 至少需2個字元",
            "oid.required" => "樂團編號 為必填",
            "position.required" => "團員位置 為必填",
            "year.required" => "團員年資 為必填",
            "year.min" => "團員年資 範圍必須介於1~50之間",
            "year.max" => "團員年資 範圍必須介於1~50之間",
            "age.required" => "團員年齡 為必填",
            "age.min" => "團員年齡 範圍必須介於16~70之間",
            "age.max" => "團員年齡 範圍必須介於16~70之間",
            "nationality.required" => "團員國籍 為必填",
            "weight.lt" => "身高 必須大於 體重",
            
            
            ], // 錯誤訊息
        );

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
        //return Member::findOrfail($id)->toArray();
        //從model拿資料
        $member = Member::findOrFail($id);
        //把資料送給 view
        return view('members.show')->with('member', $member);
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
    public function update(CreateMemberRequest $request, $id)
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
