<?php

namespace App\Models\Prosiding;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $guarded = [];
    protected $appends = ['imageFull', 'dateFormat'];

    public function getUser(){
        return $this->belongsTo(User::class, 'created_by');

    }

    public function getDateFormatAttribute(){
        $date = Carbon::parse($this->created_at)->isoFormat('dddd, D MMMM Y').' | '.Carbon::parse($this->created_at)->format('h:i');
        return $date;
    }

    public function getImageFullAttribute(){
        return asset('storage/pictures').'/event/16_9/big/'.$this->image;
    }
}
