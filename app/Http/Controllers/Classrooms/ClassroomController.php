<?php

namespace App\Http\Controllers\Classrooms;
use App\Http\Controllers\Controller;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        $grades = Grade::all();
        return view('pages.classrooms.index', compact('classrooms', 'grades'));
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

            $classrooms = new Classroom();
            $classrooms->name = ['en' => $request->name_en, 'ar' => $request->name];
            $classrooms->grade_id = $request->grade_id;
            $classrooms->save();

            return redirect()->route('classrooms.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $classrooms = Classroom::findOrFail($request->id);
            $classrooms->update([

                $classrooms->name = ['ar' => $request->name, 'en' => $request->name_en],
                $classrooms->grade_id = $request->grade_id,
            ]);

            return redirect()->route('classrooms.index');
        }

        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $sections = Section::where('classroom_id',$request->id)->pluck('classroom_id');

        if($sections->count() == 0){
            $classrooms = Classroom::findOrFail($request->id)->delete();
            return redirect()->route('classrooms.index');
        }
        else{
            return redirect()->route('classrooms.index');
        }
    }

    public function delete_all_c(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Classroom::whereIn('id', $delete_all_id)->delete();
        return redirect()->route('classrooms.index');
    }

    public function Filter_Classes_Grade(Request $request)
    {
        $grades = Grade::all();
        $Search = Classroom::select('*')->where('grade_id','=',$request->grade_id)->get();
        return view('pages.classrooms.index',compact('grades'))->withDetails($Search);
    }
}
