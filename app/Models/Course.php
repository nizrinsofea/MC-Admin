<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $table = "proposal";
    public $timestamps = false;
    public $fillable = [
		'coursecode','coursetitle','courseinfo','credithr','category',
	];
}
