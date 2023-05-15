<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Candidate extends Authenticable
{
    use HasFactory;
    public function rCandidateEducation(){
        return $this->hasMany(CandidateEducation::class,'candidate_id');
    }
    public function rCandidateSkill(){
        return $this->hasMany(CandidateSKill::class,'candidate_id');
    }
    public function rCandidateExperience(){
        return $this->hasMany(CandidateExperience::class,'candidate_id');
    }
    public function rCandidateResume(){
        return $this->hasMany(CandidateResume::class,'candidate_id');
    }
    

}
