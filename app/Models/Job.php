<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'salary',
        'location',
        'url',
        'schedule',
        'avatar',
        'employer_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    
}
