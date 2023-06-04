<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['title'];
    protected $fillable = ['title','amount','grade_id','classroom_id','year','description','fee_type'];

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }

    public function fee_type()
    {
        return $this->fee_type ? 'Study fees' : "Bus fees";
    }

    
}
