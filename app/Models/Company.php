<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Company extends Authenticable
{
    use HasFactory;
    public function rJob(){
        return $this->hasMany(Job::class,'company_id');
    }
    public function rCompanyPhoto(){
        return $this->hasMany(CompanyPhoto::class,'company_id');
    }
    public function rCompanyVideo(){
        return $this->hasMany(CompanyVideo::class,'company_id');
    }
    public function rCompanyIndustry()
    {
        return $this->belongsTo(CompanyIndustry::class, 'company_industry_id');
    }

    public function rCompanyLocation(){
        return $this->belongsTo(CompanyLocation::class,'company_location_id');
    }

    public function rCompanySize(){
        return $this->belongsTo(CompanySize::class,'company_size_id');
    }
    public function rOrder(){
        return $this->hasMany(Order::class,'company_id');
    }
}
