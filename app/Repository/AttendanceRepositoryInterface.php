<?php


namespace App\Repository;


interface AttendanceRepositoryInterface
{

    // GetAttendances
    public function GetAttendances();

    // StoreAttendances
    public function StoreAttendances($request);

    // ShowAttendances
    public function ShowAttendances($id);

}
