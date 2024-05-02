<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class IndexAnnouncement extends Component
{
    public $announcement;

    public function render()
    {
        return view('livewire.index-announcement',
        ['announcements'=>Announcement::all()]);
    }
}
