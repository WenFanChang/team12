<?php

namespace App\Http\Controllers;


use App\Models\Member;
use App\Models\Orchestra;
use App\Http\Requests\CreateMemberRequest;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index')->with('members', $members);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orchestras = Orchestra::orderBy('orchestras.id','asc')->pluck('orchestras.name','orchestras.id');
       return view('members.create',['orchestras' =>$orchestras,'orchestraSelected'=>null]);
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
            //'height' => 'required|numeric|min:150|max:220',
            'height' => 'nullable',
            //'weight' => 'required|numeric|min:40|max:120|lt:height', // lt = less than, lg = larger than
            'weight' => 'nullable',
            'year' => 'required|numeric|min:1|max:15',
            //'year' => 'nullable', 
            'age' => 'required|numeric|min:16|max:59',
            'nationality' => 'required|string|min:2|max:191',
            ],//驗證規則
            [
                "name.required" => "團員名稱 為必填",
                "name.min" => "團員名稱 至少需2個字元",
                "oid.required" => "樂團編號 為必填",
                "position.required" => "團員位置 為必填",
                /*"height.required" => "團員身高 為必填",
                "height.numeric" => "團員身高 必須為數字",
                "height.min" => "團員身高 範圍必須介於150~220之間",
                "height.max" => "團員身高 範圍必須介於150~220之間",
                "weight.required" => "團員體重 為必填",
                "weight.numeric" => "團員身高 必須為數字",
                "weight.min" => "團員體重 範圍必須介於40~120之間",
                "weight.max" => "團員體重 範圍必須介於150~220之間",*/
                "year.required" => "團員年資 為必填",
                "year.min" => "團員年資 範圍必須介於1~15之間",
                "year.max" => "團員年資 範圍必須介於1~15之間",
                "age.required" => "團員年齡 為必填",
                "age.min" => "團員年齡 範圍必須介於16~59之間",
                "age.max" => "團員年齡 範圍必須介於16~59之間",
                "nationality.required" => "團員國籍 為必填",
                "weight.lt" => "身高 必須大於 體重",
                
            ],//錯誤訊息
        );

        $name =$request->input('name');
        $oid =$request->input('oid');
        $position =$request->input('position');
        $height =$request->input('height');
        $weight =$request->input('weight');
        $year =$request->input('year');
        $age =$request->input('age');
        $nationality =$request->input('nationality');
        

        $member= Member::create([
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
        $member = Member::findOrfail($id);
        return view('members.show')->with('member',$member);
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
       $orchestras= Orchestra::orderBy('orchestras.id','asc')->pluck('orchestras.name','orchestras.id');
       $selected_tags= $member->orchestra->id;
       return view('members.edit', ['member'=>$member ,'orchestras'=>$orchestras,'orchestraSelected'=>$selected_tags   ]);
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
        $request->validate(
            [
            'name' => 'required|string|min:2|max:191',
            'oid' => 'required',
            'position' => 'required|string|min:2|max:191',
            //'height' => 'required|numeric|min:150|max:220',
            'height' => 'nullable',
            //'weight' => 'required|numeric|min:40|max:120|lt:height', // lt = less than, lg = larger than
            'weight' => 'nullable',
            'year' => 'required|numeric|min:1|max:15',
            //'year' => 'nullable', 
            'age' => 'required|numeric|min:16|max:59',
            'nationality' => 'required|string|min:2|max:191',
            ],//驗證規則
            [
                "name.required" => "團員名稱 為必填",
                "name.min" => "團員名稱 至少需2個字元",
                "oid.required" => "樂團編號 為必填",
                "position.required" => "團員位置 為必填",
                /*"height.required" => "團員身高 為必填",
                "height.numeric" => "團員身高 必須為數字",
                "height.min" => "團員身高 範圍必須介於150~220之間",
                "height.max" => "團員身高 範圍必須介於150~220之間",
                "weight.required" => "團員體重 為必填",
                "weight.numeric" => "團員身高 必須為數字",
                "weight.min" => "團員體重 範圍必須介於40~120之間",
                "weight.max" => "團員體重 範圍必須介於150~220之間",*/
                "year.required" => "團員年資 為必填",
                "year.min" => "團員年資 範圍必須介於1~15之間",
                "year.max" => "團員年資 範圍必須介於1~15之間",
                "age.required" => "團員年齡 為必填",
                "age.min" => "團員年齡 範圍必須介於16~59之間",
                "age.max" => "團員年齡 範圍必須介於16~59之間",
                "nationality.required" => "團員國籍 為必填",
                "weight.lt" => "身高 必須大於 體重",
                
            ],//錯誤訊息
        );

       $member = Member:: findOrfail($id);
       $member->name = $request->input('name');
       $member->oid = $request->input('oid');
       $member->position = $request->input('position');
       $member->height=$request->input('height');
       $member->weight=$request->input('weight');
       $member->year=$request->input('year');
       $member->age = $request->input('age');
       $member->nationality=$request->input('nationality');
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
