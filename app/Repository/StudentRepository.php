<?php

namespace App\Repository;
use App\Models\Gender;
use App\Models\Nationalitie;
use App\Models\Blood;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Image;
use App\Models\Myparent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface{

    public function GetStudents()
    {
        $students = Student::all();
        return view('pages.students.index',compact('students'));
    }

    public function CreateStudents()
    {
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $data['grades'] = Grade::all();
        $data['parents'] = Myparent::all();
        return view('pages.students.create',$data);
    }

    public function StoreStudents($request)
    {


        DB::beginTransaction();

        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->date_birth = $request->date_birth;
            $students->academic_year = $request->academic_year;
            $students->grade_id = $request->grade_id;
            $students->classroom_id = $request->classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->save();

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images = new Image();
                    $images->filename = $name;
                    $images->imageable_id = $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
            return redirect()->route('students.index');

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowStudents($id)
    {
        $students = Student::findorfail($id);
        return view('pages.students.show',compact('students'));
    }

    public function EditStudents($id)
    {
        $data['genders'] = Gender::all();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $data['grades'] = Grade::all();
        $data['parents'] = Myparent::all();
        $students =  Student::findOrFail($id);
        return view('pages.students.edit',$data,compact('students'));
    }

    public function UpdateStudents($request)
    {
        try{
            $students = Student::findorfail($request->id);
            $students->name = ['en' => $request->name_en, 'ar' => $request->name];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->date_birth = $request->date_birth;
            $students->academic_year = $request->academic_year;
            $students->grade_id = $request->grade_id;
            $students->classroom_id = $request->classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->save();
            return redirect()->route('students.index');
        }

        catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteStudents($request)
    {
        Student::destroy($request->id);
        return redirect()->route('students.index');
    }

    public function GetClassrooms($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");
        return $list_classes;
    }

    public function GetSections($id)
    {
        $list_sections = Section::where("classroom_id", $id)->pluck("name", "id");
        return $list_sections;
    }

    public function UploadAttachment($request)
    {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images = new Image();
            $images->filename = $name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
        return redirect()->route('students.show',$request->student_id);
    }

    public function DownloadAttachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function DeleteAttachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        Image::where('id',$request->id)->where('filename',$request->filename)->delete();
        return redirect()->route('students.show',$request->student_id);
    }

    public function delete_all_s($request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Student::whereIn('id', $delete_all_id)->delete();
        return redirect()->route('students.index');
    }

}
