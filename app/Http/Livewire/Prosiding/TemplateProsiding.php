<?php

namespace App\Http\Livewire\Prosiding;

use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class TemplateProsiding extends Component
{
    use WithPagination, LivewireAlert, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $url, $document;

    public function render()
    {
        $json = file_get_contents('JSON/template.json');
        $data = json_decode($json, true);
        // dd($data);
        $this->dispatchBrowserEvent('iconLoad');
        return view('livewire.prosiding.template-prosiding', [
            'data' => $data['data']['data'] ?? [],
        ]);
    }


    public function createLinkProsiding(){
        $this->validate([
            'document' => 'required'
        ]);
        $filename = $this->document->getClientOriginalName();
        // dd($filename);
        $this->document->storeAs('public/files/template/', $filename);

        try{
            // dd($this->url);
            $data['data'] = array([
                'id' => auth()->user()->id * 9,
                'name' => $filename,
                'created_by' => auth()->user()->name,
                'created_at' => Carbon::now()->format('D, d M Y - H:i:s')
            ]);
            $json = json_encode(array('data' => $data));
            //write json to file
            if (file_put_contents("JSON/template.json", $json)){
                $msg = 'Data berhasil ditambahkan';
            }else{
                $msg = 'Error saat menambahkan data';
            }

            $this->alert('success', $msg, [
                'position' => 'center',
            ]);

        $this->dispatchBrowserEvent('closeModal');

        }catch(Exception $error){
            $this->alert('error', $error->getMessage(), [
                'position' => 'center',
            ]);
        }
    }
}

