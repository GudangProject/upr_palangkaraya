<?php

namespace App\Models\Prosiding;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prosiding\BidangIlmu;
use Carbon\Carbon;

class ProsidingNaskah extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $append = ['tanggalSubmit', 'document'];

    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getBidangIlmu(){
        return $this->belongsTo(BidangIlmu::class, 'bidang_ilmu_id');
    }

    public function getTanggalSubmitAttribute(){
        $date = Carbon::parse($this->created_at)->isoFormat('dddd, D MMMM Y');
        return $date;
    }

    public function getDocumentAttribute(){
        $file = config('app.url').'/storage/files/naskah/'.$this->file_naskah;
        return $file;
    }

    public function getPptViewAttribute(){
        $file = config('app.url').'/storage/files/naskah/ppt/'.$this->ppt_file;
        return $file;
    }
}
