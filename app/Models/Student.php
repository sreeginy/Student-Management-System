<?php

namespace App\Models;

use App\Models\student;
use App\Models\grade;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $casts = [
        'subject_name'=> 'array'
    ];
}
