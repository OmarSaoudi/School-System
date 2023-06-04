<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $table = 'teachers';
    protected $guarded=[];

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization', 'specialization_id');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    public function section()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }

}
