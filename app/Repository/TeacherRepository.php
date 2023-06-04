<?php

namespace App\Repository;

use App\Models\Specialization;
use App\Models\Gender;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TeacherRepository implements TeacherRepositoryInterface{

    public function GetTeachers()
    {
        $teachers = Teacher::all();
        return view('pages.teachers.index',compact('teachers'));
    }

    public function CreateTeachers()
    {
        $data['specializations'] = Specialization::all();
        $data['genders'] = Gender::all();
        return view('pages.teachers.create',$data);
    }

    public function StoreTeachers($request)
    {

        try {
            $teachers = new Teacher();
            $teachers->name = ['en' => $request->name_en, 'ar' => $request->name];
            $teachers->email = $request->email;
            $teachers->password = Hash::make($request->password);
            $teachers->specialization_id = $request->specialization_id;
            $teachers->gender_id = $request->gender_id;
            $teachers->joining_date = $request->joining_date;
            $teachers->address = $request->address;
            $teachers->save();

            return redirect()->route('teachers.index');

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowTeachers($id)
    {
        $teachers = Teacher::findorfail($id);
        return view('pages.teachers.show',compact('teachers'));
    }

    public function EditTeachers($id)
    {
        $data['specializations'] = Specialization::all();
        $data['genders'] = Gender::all();
        $teachers =  Teacher::findOrFail($id);
        return view('pages.teachers.edit',$data,compact('teachers'));
    }

    public function UpdateTeachers($request)
    {
        try{
            $teachers = Teacher::findorfail($request->id);
            $teachers->name = ['en' => $request->name_en, 'ar' => $request->name];
            $teachers->email = $request->email;
            $teachers->password = Hash::make($request->password);
            $teachers->specialization_id = $request->specialization_id;
            $teachers->gender_id = $request->gender_id;
            $teachers->joining_date = $request->joining_date;
            $teachers->address = $request->address;
            $teachers->save();

            return redirect()->route('teachers.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteTeachers($request)
    {
        Teacher::destroy($request->id);
        return redirect()->route('teachers.index');
    }

    public function delete_all_t($request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Teacher::whereIn('id', $delete_all_id)->delete();
        return redirect()->route('teachers.index');
    }
}
