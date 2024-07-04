<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;

class ShowListing extends Component
{
    public $listing;

    public function mount(Listing $listing)
    {
        
        $this->listing = $listing;
    }

    public function render()
    {
        return view('livewire.show-listing', ['listing' => $this->listing]);
    }
}
