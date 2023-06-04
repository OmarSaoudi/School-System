<?php

namespace App\Repository;

interface ReceiptStudentRepositoryInterface{

      // GetReceiptStudent
      public function GetReceiptStudent();

      // StoreReceiptStudent
      public function StoreReceiptStudent($request);

      // ShowReceiptStudent
      public function ShowReceiptStudent($id);

      // EditReceiptStudent
      public function EditReceiptStudent($id);

      // UpdateReceiptStudent
      public function UpdateReceiptStudent($request);

      // DeleteReceiptStudent
      public function DeleteReceiptStudent($request);

}


