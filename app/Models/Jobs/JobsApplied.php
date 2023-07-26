<?php

namespace App\Models\Jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsApplied extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getJobs(){
        return $this->belongsTo(Jobs::class, 'jobs_id');
    }
}
