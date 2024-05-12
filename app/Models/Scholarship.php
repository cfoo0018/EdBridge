<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $table = 'scholarships';

    protected $fillable = [
        'for_international_students',
        'description',
        'gender',
        'provider',
        'level_of_study',
        'for_australian_students',
        'title',
        'more_information_url',
        'field_of_study',
        'frequency',
        'number_per_year',
        'student_type',
        'eligibility',
        'duration',
        'closing_date',
        'amount'
    ];
}
