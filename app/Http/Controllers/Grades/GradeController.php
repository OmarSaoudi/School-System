<?php

namespace App\Http\Controllers\Grades;
use App\Http\Controllers\Controller;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades.index', compact('grades'));
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
            $grades = new Grade();
            $grades->name = ['en' => $request->name_en, 'ar' => $request->name];
            $grades->notes = $request->notes;
            $grades->save();
            return redirect()->route('grades.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $grades = Grade::findOrFail($request->id);
            $grades->update([
            $grades->name = ['ar' => $request->name, 'en' => $request->name_en],
            $grades->notes = $request->notes,
          ]);
          return redirect()->route('grades.index');
        }
        catch(\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $classrooms = Classroom::where('grade_id',$request->id)->pluck('grade_id');

        if($classrooms->count() == 0){
            $grades = Grade::findOrFail($request->id)->delete();
            return redirect()->route('grades.index');
        }
        else{
            return redirect()->route('grades.index');
        }
    }
}
