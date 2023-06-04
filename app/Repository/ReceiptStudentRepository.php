<?php

namespace App\Repository;

use App\Models\ReceiptStudent;
use App\Models\FundAccount;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ReceiptStudentRepository implements ReceiptStudentRepositoryInterface
{

    public function GetReceiptStudent()
    {
        $receipt_students = ReceiptStudent::all();
        return view('pages.receipt_students.index', compact('receipt_students'));
    }


    public function StoreReceiptStudent($request)
    {
        DB::beginTransaction();

        try {

            // حفظ البيانات في جدول سندات القبض
            $receipt_students = new ReceiptStudent();
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->debit = $request->debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->debit = $request->debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطالب
            $studentaccount = new StudentAccount();
            $studentaccount->date = date('Y-m-d');
            $studentaccount->type = 'receipt';
            $studentaccount->receipt_id = $receipt_students->id;
            $studentaccount->student_id = $request->student_id;
            $studentaccount->debit = 0.00;
            $studentaccount->credit = $request->debit;
            $studentaccount->description = $request->description;
            $studentaccount->save();

            DB::commit();
            return redirect()->route('receipt_students.index');

        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function ShowReceiptStudent($id)
    {
        $students = Student::findorfail($id);
        return view('pages.receipt_students.create',compact('students'));
    }

    public function EditReceiptStudent($id)
    {
        $receipt_students = ReceiptStudent::findorfail($id);
        return view('pages.receipt_students.edit', compact('receipt_students'));
    }

    public function UpdateReceiptStudent($request)
    {
        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول سندات القبض
            $receipt_students = ReceiptStudent::findorfail($request->id);
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->debit = $request->debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // تعديل البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->debit = $request->debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // تعديل البيانات في جدول الصندوق
            $fund_accounts = StudentAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->student_id = $request->student_id;
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            DB::commit();
            return redirect()->route('receipt_students.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteReceiptStudent($request)
    {

        try {
            ReceiptStudent::destroy($request->id);
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
