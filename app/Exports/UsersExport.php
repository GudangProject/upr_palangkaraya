<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    protected $selectedKey = [];

    public function __construct($user)
    {
        $this->selectedKey = $user;
    }

    public function collection()
    {
        return User::whereIn('id', $this->selectedKey)->get();
    }
}
