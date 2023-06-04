<?php

namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;
use App\Models\Classroom;

class FeeRepository implements FeeRepositoryInterface{

    public function GetFees()
    {
        $fees = Fee::all();
        return view('pages.fees.index',compact('fees'));
    }

    public function CreateFees()
    {
        $data['grades'] = Grade::all();
        $data['classrooms'] = Classroom::all();
        return view('pages.Fees.create',$data);
    }

    public function StoreFees($request)
    {

        try {
            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title];
            $fees->amount = $request->amount;
            $fees->grade_id = $request->grade_id;
            $fees->classroom_id = $request->classroom_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->fee_type  = $request->fee_type;
            $fees->save();

            return redirect()->route('fees.index');

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowFees($id)
    {
        $fees = Fee::findorfail($id);
        return view('pages.fees.show',compact('fees'));
    }

    public function EditFees($id)
    {
        $data['grades'] = Grade::all();
        $data['classrooms'] = Classroom::all();
        $fees =  Fee::findOrFail($id);
        return view('pages.fees.edit',$data,compact('fees'));
    }

    public function UpdateFees($request)
    {
        try{
            $fees = Fee::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title];
            $fees->amount = $request->amount;
            $fees->grade_id = $request->grade_id;
            $fees->classroom_id = $request->classroom_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->fee_type  = $request->fee_type;
            $fees->save();

            return redirect()->route('fees.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteFees($request)
    {
        Fee::destroy($request->id);
        return redirect()->route('fees.index');
    }
}
