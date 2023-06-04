<?php

namespace App\Repository;

use App\Models\Myparent;
use App\Models\Religion;
use App\Models\Nationalitie;
use App\Models\Blood;
use Illuminate\Support\Facades\Hash;

class MyparentRepository implements MyparentRepositoryInterface{

    public function GetMyparents()
    {
        $myparents = Myparent::all();
        return view('pages.myparents.index',compact('myparents'));
    }

    public function CreateMyparents()
    {
        $data['religions'] = Religion::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        return view('pages.Myparents.create',$data);
    }

    public function StoreMyparents($request)
    {

        try {
            $myparents = new Myparent();

            $myparents->name_father = ['en' => $request->name_father_en, 'ar' => $request->name_father];
            $myparents->job_father = ['en' => $request->job_father_en, 'ar' => $request->job_father];
            $myparents->email = $request->email;
            $myparents->phone_father = $request->phone_father;
            $myparents->address_father = $request->address_father;
            $myparents->national_id_father = $request->national_id_father;
            $myparents->passport_id_father = $request->passport_id_father;
            $myparents->password = Hash::make($request->password);
            $myparents->nationalitie_father_id = $request->nationalitie_father_id;
            $myparents->blood_father_id = $request->blood_father_id;
            $myparents->religion_father_id = $request->religion_father_id;

            $myparents->name_mother = ['en' => $request->name_mother_en, 'ar' => $request->name_mother];
            $myparents->job_mother = ['en' => $request->job_mother_en, 'ar' => $request->job_mother];
            $myparents->phone_mother = $request->phone_mother;
            $myparents->address_mother = $request->address_mother;
            $myparents->national_id_mother = $request->national_id_mother;
            $myparents->passport_id_mother = $request->passport_id_mother;
            $myparents->nationalitie_mother_id = $request->nationalitie_mother_id;
            $myparents->blood_mother_id = $request->blood_mother_id;
            $myparents->religion_mother_id = $request->religion_mother_id;
            $myparents->save();

            return redirect()->route('myparents.index');

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowMyparents($id)
    {
        $myparents = Myparent::findorfail($id);
        return view('pages.myparents.show',compact('myparents'));
    }

    public function EditMyparents($id)
    {
        $data['religions'] = Religion::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $myparents =  Myparent::findOrFail($id);
        return view('pages.myparents.edit',$data,compact('myparents'));
    }

    public function UpdateMyparents($request)
    {
        try{
            $myparents = Myparent::findorfail($request->id);
            $myparents->name_father = ['en' => $request->name_father_en, 'ar' => $request->name_father];
            $myparents->job_father = ['en' => $request->job_father_en, 'ar' => $request->job_father];
            $myparents->email = $request->email;
            $myparents->phone_father = $request->phone_father;
            $myparents->address_father = $request->address_father;
            $myparents->national_id_father = $request->national_id_father;
            $myparents->passport_id_father = $request->passport_id_father;
            $myparents->password = Hash::make($request->password);
            $myparents->nationalitie_father_id = $request->nationalitie_father_id;
            $myparents->blood_father_id = $request->blood_father_id;
            $myparents->religion_father_id = $request->religion_father_id;

            $myparents->name_mother = ['en' => $request->name_mother_en, 'ar' => $request->name_mother];
            $myparents->job_mother = ['en' => $request->job_mother_en, 'ar' => $request->job_mother];
            $myparents->phone_mother = $request->phone_mother;
            $myparents->address_mother = $request->address_mother;
            $myparents->national_id_mother = $request->national_id_mother;
            $myparents->passport_id_mother = $request->passport_id_mother;
            $myparents->nationalitie_mother_id = $request->nationalitie_mother_id;
            $myparents->blood_mother_id = $request->blood_mother_id;
            $myparents->religion_mother_id = $request->religion_mother_id;
            $myparents->save();

            return redirect()->route('myparents.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteMyparents($request)
    {
        Myparent::destroy($request->id);
        return redirect()->route('myparents.index');
    }
}
