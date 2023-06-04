<?php

namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Repository\StudentRepositoryInterface;

class StudentController extends Controller
{

    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->Student->GetStudents();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Student->CreateStudents();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Student->StoreStudents($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Student->ShowStudents($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Student->EditStudents($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->Student->UpdateStudents($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Student->DeleteStudents($request);
    }

    public function GetClassrooms($id)
    {
       return $this->Student->GetClassrooms($id);
    }

    public function GetSections($id)
    {
        return $this->Student->GetSections($id);
    }

    public function UploadAttachment(Request $request)
    {
        return $this->Student->UploadAttachment($request);
    }

    public function DownloadAttachment($studentsname,$filename)
    {
        return $this->Student->DownloadAttachment($studentsname,$filename);
    }

    public function DeleteAttachment(Request $request)
    {
        return $this->Student->DeleteAttachment($request);
    }

    public function delete_all_s(Request $request)
    {
        return $this->Student->delete_all_s($request);
    }

}
