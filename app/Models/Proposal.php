<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coursecode',
        'coursetitle',
        'description',
        'credithr',
        'category',
        'file_name',
        'file_path',
        'assessment',
        'learningoutcomes',
        'coursejustification',
        'courseimpact',
        'created_by'
    ];

    public function setAssessmentAttribute($value)
    {
        $this->attributes['assessment'] = json_encode($value);
    }

    public function getAssessmentAttribute($value)
    {
        return $this->attributes['assessment'] = json_decode($value);
    }
}