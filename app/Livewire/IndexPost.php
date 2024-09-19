<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class IndexPost extends Component
{

    public $title = 'Titol...';
    public $posts = [];
    public $search = '';

    public function mount(){
        $this->posts = Post::all();
    }

    public function cerca(){
        $this->posts = Post::where("title", $this->search)->get();        
    }

    public function render()
    {
        return view('livewire.index-post');
    }
}
