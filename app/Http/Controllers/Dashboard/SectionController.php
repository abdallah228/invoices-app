<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\Http\Requests\SectionRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = Section::all();
        return view('sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        //validation
       // return $request->all();
      $section =  Section::create([
        'section_name'=>$request->section_name,
        'description'=>$request->description,
        'created_by'=> auth()->user()->name,
       ]);
       if(!$section)
       {
        return redirect()->route('sections.index')->with(['error'=>'حدث خطا ما ']);
        }
    else
       return redirect()->route('sections.index')->with(['success'=>'تم اضافه القسم بنجاح']);
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
    public function update(SectionRequest $request, $id)
    {
        //validation
       $id = $request->id;
        $sections = Section::find($id);
       $sections->update($request->all());
        return redirect()->route('sections.index')->with(['success'=>'تم تعديل القسم بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Request $request)
    {
        //
        $id = $request->id;
        $section = Section::find($id);
        $section->delete();
        return redirect()->route('sections.index')->with(['success'=>'تم حذف القسم بنجاح']);
    }
}
