<?php

namespace App\Repository;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;

class AttendanceRepository implements AttendanceRepositoryInterface
{

    public function GetAttendances()
    {
        $grades = Grade::with(['section'])->get();
        $list_grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.attendances.sections', compact('grades','list_grades','teachers'));
    }

    public function ShowAttendances($id)
    {
        $students = Student::with('attendance')->where('section_id',$id)->get();
        return view('pages.attendances.index',compact('students'));
    }

    public function StoreAttendances($request)
    {
        try {

            foreach ($request->attendences as $studentid => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }

                Attendance::create([
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);

            }

            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
