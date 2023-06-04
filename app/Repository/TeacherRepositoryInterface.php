<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    // Get Teachers
    public function GetTeachers();

    // CreateTeachers
    public function CreateTeachers();

    // StoreTeachers
    public function StoreTeachers($request);

    // ShowTeachers
    public function ShowTeachers($id);

    // EditTeachers
    public function EditTeachers($id);

    // UpdateTeachers
    public function UpdateTeachers($request);

    // DeleteTeachers
    public function DeleteTeachers($request);

    // DeleteAllTeachers
    public function delete_all_t($request);

}


