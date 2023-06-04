<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Myparent extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name_father','job_father','name_mother','job_mother'];
    protected $table = 'myparents';
    protected $guarded=[];

    public function nationalitiefather()
    {
        return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_father_id');
    }

    public function bloodfather()
    {
        return $this->belongsTo('App\Models\Blood', 'blood_father_id');
    }

    public function religionfather()
    {
        return $this->belongsTo('App\Models\Religion', 'religion_father_id');
    }

    public function nationalitiemother()
    {
        return $this->belongsTo('App\Models\Nationalitie', 'nationalitie_mother_id');
    }

    public function bloodmother()
    {
        return $this->belongsTo('App\Models\Blood', 'blood_mother_id');
    }

    public function religionmother()
    {
        return $this->belongsTo('App\Models\Religion', 'religion_mother_id');
    }

}

?>
