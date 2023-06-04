<?php

namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Repository\AttendanceRepositoryInterface;

class AttendanceController extends Controller
{

    protected $Attendance;

    public function __construct(AttendanceRepositoryInterface $Attendance)
    {
        $this->Attendance = $Attendance;
    }

    public function index()
    {
        return $this->Attendance->GetAttendances();
    }


    public function store(Request $request)
    {
        return $this->Attendance->StoreAttendances($request);
    }


    public function show($id)
    {
        return $this->Attendance->ShowAttendances($id);
    }

}
