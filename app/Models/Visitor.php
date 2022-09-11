<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
            'name',
            'mrn',
            'reference_no',
            'gender',
            'birth_date',
            'location',
            'lab_id',
            'sample_no',
            'passport_no',
            'reg_date',
            'collection_date',
            'reporting_date',
    ];
}
