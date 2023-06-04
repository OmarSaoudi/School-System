<?php

namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;

use App\Models\PaymentStudent;
use Illuminate\Http\Request;
use App\Repository\PaymentStudentRepositoryInterface;

class PaymentStudentController extends Controller
{
    protected $PaymentStudent;

    public function __construct(PaymentStudentRepositoryInterface $PaymentStudent)
    {
        $this->PaymentStudent = $PaymentStudent;
    }


    public function index()
    {
        return $this->PaymentStudent->GetPaymentStudents();
    }

    public function store(Request $request)
    {
        return $this->PaymentStudent->StorePaymentStudents($request);
    }


    public function show($id)
    {
        return $this->PaymentStudent->ShowPaymentStudents($id);
    }


    public function edit($id)
    {
        return $this->PaymentStudent->EditPaymentStudents($id);
    }


    public function update(Request $request)
    {
        return $this->PaymentStudent->UpdatePaymentStudents($request);
    }


    public function destroy(Request $request)
    {
        return $this->PaymentStudent->DeletePaymentStudents($request);
    }
}
