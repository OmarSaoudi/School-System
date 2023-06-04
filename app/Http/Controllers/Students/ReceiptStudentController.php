<?php

namespace App\Http\Controllers\Students;
use App\Http\Controllers\Controller;

use App\Models\ReceiptStudent;
use Illuminate\Http\Request;
use App\Repository\ReceiptStudentRepositoryInterface;

class ReceiptStudentController extends Controller

{
    protected $ReceiptStudent;

    public function __construct(ReceiptStudentRepositoryInterface $ReceiptStudent)
    {
        $this->ReceiptStudent = $ReceiptStudent;
    }


    public function index()
    {
        return $this->ReceiptStudent->GetReceiptStudent();
    }

    public function store(Request $request)
    {
        return $this->ReceiptStudent->StoreReceiptStudent($request);
    }


    public function show($id)
    {
        return $this->ReceiptStudent->ShowReceiptStudent($id);
    }


    public function edit($id)
    {
        return $this->ReceiptStudent->EditReceiptStudent($id);
    }


    public function update(Request $request)
    {
        return $this->ReceiptStudent->UpdateReceiptStudent($request);
    }


    public function destroy(Request $request)
    {
        return $this->ReceiptStudent->DeleteReceiptStudent($request);
    }
}
