<?php

namespace App\Repository;

interface MyparentRepositoryInterface{

    // Get Myparents
    public function GetMyparents();

    // CreateMyparents
    public function CreateMyparents();

    // StoreMyparents
    public function StoreMyparents($request);

    // ShowMyparents
    public function ShowMyparents($id);

    // EditMyparents
    public function EditMyparents($id);

    // UpdateMyparents
    public function UpdateMyparents($request);

    // DeleteMyparents
    public function DeleteMyparents($request);

}
