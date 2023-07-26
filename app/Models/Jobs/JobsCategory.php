<?php

namespace App\Models\Jobs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUser(){
        return $this->belongsTo(User::class, 'created_by');
    }

}
