<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Configuration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded = [];

    public function getOwner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function getCreated(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
