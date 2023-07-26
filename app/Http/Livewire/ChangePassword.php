<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ChangePassword extends Component
{
    use LivewireAlert;
    public
        $passwordOld,
        $password,
        $passwordConfirm;

    protected $rules = [
        'passwordOld'       => 'required|min:8',
        'password'          => 'required|min:8',
        'passwordConfirm'   => 'required_with:password|same:password|min:8',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
        $user = auth()->user();
        if(Hash::check($this->passwordOld, $user->password)) {
            $save = User::findOrFail($user->id);
            $save->password = Hash::make($this->password);
            $save->save();

            $this->alert('success', 'Password has ben changed !', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'width' => '',
               ]);

            return redirect()->route('userssetting.index');
        }else{
            $this->alert('error', 'Old Passowrd Wrong', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'width' => '',
               ]);
        }

    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
