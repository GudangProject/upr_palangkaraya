<?php

namespace App\Models\Jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $guarded = [];

    public function getCategory(){
        return $this->belongsTo(JobsCategory::class, 'category_id');
    }

    public function getUser(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
