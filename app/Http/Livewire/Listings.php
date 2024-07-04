<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Listing;

class Listings extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.listings', [
            'listings' => Listing::paginate(10)
        ]);
    }
    public function route($name)
    {
        return redirect()->route($name);
    }
    public function showListing($listingId)
    {
        return redirect()->to(route('listings.show', $listingId));
    }
}
