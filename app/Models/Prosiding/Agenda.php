<?php

namespace App\Models\Prosiding;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Agenda extends Model
{
    use HasFactory;

    protected $table        = 'agendas';
    protected $primaryKey   = 'id';
    protected $appends      =  ['dateFormat'];

    public function getUser(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getDateFormatAttribute(){
        $date = Carbon::parse($this->date)->isoFormat('dddd, D MMMM Y').' | '.Carbon::parse($this->date)->format('h:i');
        return $date;
    }
}
