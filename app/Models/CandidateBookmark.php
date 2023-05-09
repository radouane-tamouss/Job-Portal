<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateBookmark extends Model
{
    public function rJob()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
    use HasFactory;
}
