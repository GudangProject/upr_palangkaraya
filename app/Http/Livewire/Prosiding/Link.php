<?php

namespace App\Http\Livewire\Prosiding;

use App\Models\LinkProsiding;
use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Link extends Component
{
    use WithPagination, LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public $title, $url, $category;

    public function render()
    {
        $data = LinkProsiding::where('status', 1)->orderByDesc('created_at')->paginate(20);
        // dd($data);
        $this->dispatchBrowserEvent('iconLoad');
        return view('livewire.prosiding.link', [
            'data' => $data,
        ]);
    }

    public function createLinkProsiding()
    {
        try {
            LinkProsiding::create([
                'title' => $this->title,
                'url' => $this->url,
                'category' => $this->category,
                'status' => 1,
            ]);

            $this->alert('success', 'Link Prosiding berhasil ditambahkan.', [
                'position' => 'center',
            ]);

            $this->reset(['title', 'url', 'category']);
            $this->dispatchBrowserEvent('closeModal');
        } catch (Exception $e) {
            $this->alert('error', 'Harap isi semua data dengan benar.', [
                'position' => 'center',
            ]);
        }
    }

    public function delete($id)
    {
        $data = LinkProsiding::find($id)->delete();
        $this->alert('success', 'Link Prosiding berhasil hapus.', [
                'position' => 'center',
            ]);
    }

    // public function createLinkProsiding(){
    //     try{
    //         // dd($this->url);
    //         $data['group'] = array([
    //             'id' => auth()->user()->id * 9,
    //             'url' => $this->url,
    //             'created_by' => auth()->user()->name,
    //             'created_at' => Carbon::now()->format('D, d M Y - H:i:s')
    //         ]);
    //         $json = json_encode(array('data' => $data));
    //         //write json to file
    //         if (file_put_contents("JSON/link-prosiding.json", $json)){
    //             $msg = 'Data berhasil ditambahkan';
    //         }else{
    //             $msg = 'Error saat menambahkan data';
    //         }

    //         $this->alert('success', $msg, [
    //             'position' => 'center',
    //         ]);

    //     $this->dispatchBrowserEvent('closeModal');

    //     }catch(Exception $error){
    //         $this->alert('error', $error->getMessage(), [
    //             'position' => 'center',
    //         ]);
    //     }
    // }
}

