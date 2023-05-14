<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateAppliedJob extends Model
{
    use HasFactory;
    public function rJob()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
    public function rCandidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}
