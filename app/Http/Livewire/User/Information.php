<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Exception;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Information extends Component
{
    use LivewireAlert;
    public $bio, $address, $dateofbirth, $age, $phone, $gender;
    public $user;

    protected $rules = [
        'dateofbirth'   => 'required',
        'phone'         => 'required|max:15',
    ];

    public function mount(){
        $this->bio          = $this->user->bio;
        $this->gender       = $this->user->gender;
        $this->dateofbirth  = $this->user->dateofbirth;
        $this->age          = $this->user->age;
        $this->phone        = $this->user->phone;
        $this->address      = $this->user->address;
    }

    public function submit()
    {
        $this->validate();
        // dd($this->age);
        try {
            $user               = User::findOrFail(auth()->user()->id);
            $user->bio          = $this->bio;
            $user->address      = $this->address;
            $user->gender       = $this->gender;
            $user->dateofbirth  = $this->dateofbirth;
            $user->age          = $this->age;
            $user->phone        = $this->phone;
            $user->save();

            $this->alert('success', 'User data information changed !', [
                'position' => 'center',
                'timer' => 5000,
                'toast' => true,
                'width' => '',
               ]);

        } catch (Exception $e) {
            $this->alert('error', $e->getMessage(), [
                'position' => 'center',
                'timer' => 9000,
                'toast' => true,
                'width' => '',
               ]);
        }
    }

    public function render()
    {
        return view('livewire.user.information', [
            'user' => $this->user
        ]);
    }
}
