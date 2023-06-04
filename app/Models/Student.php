<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $guarded =[];

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function nationalitie()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }


    public function myparent()
    {
        return $this->belongsTo(Myparent::class, 'parent_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');
    }

    public function attendance()
    {
        return $this->hasMany('App\Models\Attendance', 'student_id');
    }

}
