<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Friends extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded  = [];
    protected $dates    = ['created_at', 'updated_at', 'deleted_at'];

    public function getName(){
        return $this->belongsTo(User::class, 'friend_id');
    }
}
