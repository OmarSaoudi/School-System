<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $fillable=['name','notes'];
    protected $table = 'grades';
    public $timestamps = true;

    public function section()
    {
        return $this->hasMany('App\Models\Section', 'grade_id');
    }
}
