<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_name',
        'problem0',
        'problem1',
        'problem2',
        'problem3',
        'problem4',
        'problem5',
        'problem6',
        'problem7',
        'problem8',
        'problem9',
    ];
}
