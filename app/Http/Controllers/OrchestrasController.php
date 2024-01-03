<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Orchestra;
use App\Http\Requests\CreateOrchestraRequest;
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

    /*public function senior()
    {
        //從model拿特定條件下的資料
        $members = Member::senior()->paginate(25);

        $companys = Company::allCompanys()->pluck('companys.company', 'companys.company');
        //把資料送給view
    
        return view('orchestras.index', ['orchestras' => $orchestras, 'companys'=>$companys, 'selectedCompany'=>null]);

    }*/

   /* public function company(Request $request)
    {
        $orchestras = Orchestra::company($request->input('pos'))->paginate(25);
        $companys = Orchestra::allCompanys()->pluck('orchestras.company', 'orchestras.company');
        $selectedCompany = $request->input('pos');
        return view('orchestras.index', ['orchestras' => $orchestras, 'companys'=>$comapnys, 'selectedCompany'=>$selectedCompany]);
    }  */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orchestras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrchestraRequest $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:2|max:100',
                'company' => 'required|string|min:2|max:100',
                'city' => 'required|string|min:2|max:100',
                'style' => 'required|string|min:2|max:100'
            ],
            [
                "name.required" => "樂團名稱 為必填",
                "name.min" => "樂團名稱 至少需2個字元",
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
        //return Orchestra::findOrfail($id)->toArray();
        //從model拿資料
        $orchestra = Orchestra::findOrFail($id);
        $members = $orchestra->members;
        //把資料送給 view
        return view('orchestras.show', ['orchestra'=>$orchestra, 'members'=>$members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        parent::edit($id);

        $orchestra = Orchestra::findOrFail($id);
        return view('orchestras.edit', ['orchestra'=>$orchestra]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOrchestraRequest $request, $id)
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
        $orchestra = Orchestra::findOrFail($id);
        $orchestra->delete();
        return redirect('orchestras');
    }
}
