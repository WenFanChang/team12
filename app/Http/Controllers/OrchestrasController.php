<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Models\Orchestra;
use Illuminate\Http\Request;

class OrchestrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orchestras = Orchestra::paginate(25);
    /* $companys = Company::allCompanys()->pluck('companys.company', 'companys.company');*/
        return view('orchestras.index')->with('orchestras', $orchestras);
    /* return view('Orchestras.index', ['orchestras' => $orchestras, 'companys'=>$companys, 'selectedcompany'=>null]);*/
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
    public function store(CreateTeamRequest $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:2|max:100',
                'company' => 'required|string|min:2|max:100',
                'city' => 'required|string|min:2|max:100',
                'style' => 'required|string|min:2|max:100',
            ],
            [
                "name.required" => "團隊名稱 為必填",
                "name.min" => "團隊名稱 至少需2個字元",
                "company.required" => "公司名稱 為必填",
                "company.min" => "公司名稱 至少需2個字元",
                "city.required" => "公司位置 為必填",
                "city.min" => "公司位置 至少需2個字元",
                "style.required" => "曲風類別 為必填",
                "style.min" => "曲風類別 至少需2個字元",
            ],
        );

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
        $orchestra = Orchestra::findOrFail($id);
        $members = $orchestra->members;
        return view ('orchestras.show', ['orchestra'=>$orchestra, 'members'=>$members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    public function update(CreateTeamRequest $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|min:2|max:100',
                'company' => 'required|string|min:2|max:100',
                'city' => 'required|string|min:2|max:100',
                'style' => 'required|string|min:2|max:100',
            ],
            [
                "name.required" => "團隊名稱 為必填",
                "name.min" => "團隊名稱 至少需2個字元",
                "company.required" => "公司名稱 為必填",
                "company.min" => "公司名稱 至少需2個字元",
                "city.required" => "公司位置 為必填",
                "city.min" => "公司位置 至少需2個字元",
                "style.required" => "曲風類別 為必填",
                "style.min" => "曲風類別 至少需2個字元",
            ],
        );

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
        $orchestra = Orchestra::findOrFail($id);
        $orchestra->delete();
        return redirect('orchestras');
    }
}
