<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $fillable=['name','grade_id'];
    protected $table = 'classrooms';
    public $timestamps = true;


    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }
}
