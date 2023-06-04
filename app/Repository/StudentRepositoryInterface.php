<?php

namespace App\Repository;

interface StudentRepositoryInterface{

    // GetStudents
    public function GetStudents();

    // CreateStudents
    public function CreateStudents();

    // StoreStudents
    public function StoreStudents($request);

    // ShowStudents
    public function ShowStudents($id);

    // EditStudents
    public function EditStudents($id);

    // UpdateStudents
    public function UpdateStudents($request);

    // DeleteStudents
    public function DeleteStudents($request);

    // GetClassrooms
    public function GetClassrooms($id);

    //GetSections
    public function GetSections($id);

    //UploadAttachment
    public function UploadAttachment($request);

    //DownloadAttachment
    public function DownloadAttachment($studentsname,$filename);

    //DeleteAttachment
    public function DeleteAttachment($request);

    // DeleteAllStudents
    public function delete_all_s($request);

}


