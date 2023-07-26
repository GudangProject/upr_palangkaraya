<?php

namespace App\Http\Livewire\User;

use App\Models\Admin\SocialMedia as AdminSocialMedia;
use Exception;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SocialMedia extends Component
{
    use LivewireAlert;
    public $twitter, $facebook, $instagram, $youtube, $linkedin, $tiktok;

    protected $rules = [
        'twitter'       => 'url',
        'facebook'      => 'url',
        'instagram'     => 'url',
        'youtube'       => 'url',
        'linkedin'      => 'url',
        'tiktok'        => 'url',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function mount($user){
        if(isset($user->getSocialMedia)){
            $this->twitter      = $user->getSocialMedia->twitter;
            $this->facebook     = $user->getSocialMedia->facebook;
            $this->instagram    = $user->getSocialMedia->instagram;
            $this->youtube      = $user->getSocialMedia->youtube;
            $this->linkedin     = $user->getSocialMedia->linkedin;
            $this->tiktok       = $user->getSocialMedia->tiktok;
        }else{
            $this->twitter      = null;
            $this->facebook     = null;
            $this->instagram    = null;
            $this->youtube      = null;
            $this->linkedin     = null;
            $this->tiktok       = null;
        }
    }

    public function submit(){
        $this->validate();
        try {
            $socialMedia = AdminSocialMedia::find(auth()->user()->id);
            if($socialMedia == null){
                AdminSocialMedia::create([
                    'user_id'   => auth()->user()->id,
                    'twitter'   => $this->twitter,
                    'facebook'  => $this->facebook,
                    'instagram' => $this->instagram,
                    'youtube'   => $this->youtube,
                    'linkedin'  => $this->linkedin,
                    'tiktok'    => $this->tiktok,
                ]);

                $this->alert('success', 'Social media added successfully...', [
                    'position' => 'center',
                    'timer' => 5000,
                    'toast' => true,
                    'width' => '',
                   ]);

            }else{
                AdminSocialMedia::findOrFail(auth()->user()->id)->update([
                    'twitter'   => $this->twitter,
                    'facebook'  => $this->facebook,
                    'instagram' => $this->instagram,
                    'youtube'   => $this->youtube,
                    'linkedin'  => $this->linkedin,
                    'tiktok'    => $this->tiktok,
                ]);

                $this->alert('success', 'Social media changed successfully...', [
                    'position' => 'center',
                    'timer' => 5000,
                    'toast' => true,
                    'width' => '',
                   ]);
            }
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
        return view('livewire.user.social-media');
    }
}
