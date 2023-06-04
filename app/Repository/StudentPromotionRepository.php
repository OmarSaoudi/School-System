<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{

    public function index()
    {
        $grades = Grade::all();
        return view('pages.students.promotions.index',compact('grades'));
    }

    public function create()
    {
        $promotions = promotion::all();
        return view('pages.students.promotions.management',compact('promotions'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            $students = Student::where('grade_id',$request->grade_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();

            if($students->count() < 1){
                return redirect()->back();
            }

            // update in table student
            foreach ($students as $student){

                $ids = explode(',',$student->id);
                Student::whereIn('id', $ids)->update([
                        'grade_id' => $request->grade_id_new,
                        'classroom_id' => $request->classroom_id_new,
                        'section_id' => $request->section_id_new,
                        'academic_year' => $request->academic_year_new,
                ]);

                // insert in to promotions
                Promotion::updateOrCreate([
                    'student_id' => $student->id,
                    'from_grade' => $request->grade_id,
                    'from_classroom' => $request->classroom_id,
                    'from_section'=> $request->section_id,
                    'to_grade' => $request->grade_id_new,
                    'to_classroom' => $request->classroom_id_new,
                    'to_section' => $request->section_id_new,
                    'academic_year' => $request->academic_year,
                    'academic_year_new' => $request->academic_year_new,
                ]);

            }

            DB::commit();
            return redirect()->route('promotions.create');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
