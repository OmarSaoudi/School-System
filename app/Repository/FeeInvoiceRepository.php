<?php

namespace App\Repository;

use App\Models\FeeInvoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\Fee;
use Illuminate\Support\Facades\DB;


class FeeInvoiceRepository implements FeeInvoiceRepositoryInterface{

    public function GetFeeInvoices()
    {
        $fee_invoices = FeeInvoice::all();
        $grades = Grade::all();
        return view('pages.fee_invoices.index', compact('fee_invoices','grades'));
    }

    public function ShowFeeInvoices($id)
    {
        $students = Student::findorfail($id);
        $fees = Fee::where('classroom_id',$students->classroom_id)->get();
        return view('pages.fee_invoices.create',compact('students','fees'));
    }

    public function StoreFeeInvoices($request)
    {

        DB::beginTransaction();

        try {

                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $fee_invoices = new FeeInvoice();
                $fee_invoices->invoice_date = date('Y-m-d');
                $fee_invoices->student_id = $request->student_id;
                $fee_invoices->grade_id = $request->grade_id;
                $fee_invoices->classroom_id = $request->classroom_id;
                $fee_invoices->fee_id = $request->fee_id;
                $fee_invoices->amount = $request->amount;
                $fee_invoices->description = $request->description;
                $fee_invoices->save();


                // حفظ البيانات في جدول حسابات الطلاب
                $studentaccount = new StudentAccount();
                $studentaccount->date = date('Y-m-d');
                $studentaccount->type = 'invoice';
                $studentaccount->fee_invoices_id = $fee_invoices->id;
                $studentaccount->student_id = $fee_invoices->student_id;
                $studentaccount->debit = $fee_invoices->amount;
                $studentaccount->credit = 0.00;
                $studentaccount->description = $fee_invoices->description;
                $studentaccount->save();

                DB::commit();
                return redirect()->route('fee_invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function EditFeeInvoices($id)
    {
        $fee_invoices = FeeInvoice::findorfail($id);
        $fees = Fee::where('classroom_id',$fee_invoices->classroom_id)->get();
        return view('pages.fee_invoices.edit', compact('fee_invoices','fees'));
    }

    public function UpdateFeeInvoices($request)
    {

        DB::beginTransaction();
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            $fee_invoices = FeeInvoice::findorfail($request->id);
            $fee_invoices->fee_id = $request->fee_id;
            $fee_invoices->amount = $request->amount;
            $fee_invoices->description = $request->description;
            $fee_invoices->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $studentaccount = StudentAccount::where('fee_invoices_id',$request->id)->first();
            $studentaccount->debit = $request->amount;
            $studentaccount->description = $request->description;
            $studentaccount->save();

            DB::commit();

            return redirect()->route('fee_invoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function DeleteFeeInvoices($request)
    {
        try {
            FeeInvoice::destroy($request->id);
            return redirect()->route('fee_invoices.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
