<?php

namespace App\Http\Controllers\Sections;
use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::with(['section'])->get();
        $list_grades = Grade::all();
        $sections = Section::all();
        $teachers = Teacher::all();
        return view('pages.sections.index',compact('grades','list_grades','sections','teachers'));
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
    public function store(Request $request)
    {

        try {
            $sections = new Section();
            $sections->name = ['ar' => $request->name, 'en' => $request->name_en];
            $sections->grade_id = $request->grade_id;
            $sections->classroom_id = $request->classroom_id;
            $sections->status = 1;
            $sections->save();
            $sections->teachers()->attach($request->teachers);

            return redirect()->route('sections.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $sections = Section::findOrFail($request->id);
            $sections->name = ['ar' => $request->name, 'en' => $request->name_en];
            $sections->grade_id = $request->grade_id;
            $sections->classroom_id = $request->classroom_id;

            if(isset($request->status)) {
              $sections->status = 1;
            } else {
              $sections->status = 2;
            }

            $sections->teachers()->sync($request->teachers);


            $sections->save();
            return redirect()->route('sections.index');
        }
        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
      Section::findOrFail($request->id)->delete();
      return redirect()->route('sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");
        return $list_classes;
    }
}
