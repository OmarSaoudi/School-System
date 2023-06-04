<?php

namespace App\Repository;

interface ProcessingFeeRepositoryInterface{

      // GetProcessingFee
      public function GetProcessingFee();

      // StoreProcessingFee
      public function StoreProcessingFee($request);

      // ShowProcessingFee
      public function ShowProcessingFee($id);

      // EditProcessingFee
      public function EditProcessingFee($id);

      // UpdateProcessingFee
      public function UpdateProcessingFee($request);

      // DeleteProcessingFee
      public function DeleteProcessingFee($request);

}


