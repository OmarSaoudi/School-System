<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $fillable=['name','grade_id','classroom_id'];
    protected $table = 'sections';
    public $timestamps = true;

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom','classroom_id');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade','grade_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section');
    }
}
