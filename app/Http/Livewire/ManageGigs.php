<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class ManageGigs extends Component
{
    public function render()
    {
        return view('livewire.manage-gigs', [
            'listings' => Listing::where('user_id', Auth::id())->get(),
        ]);
    }

    public function delete(Listing $listing)
    {
        $listing->delete();

        session()->flash('message', 'Listing deleted successfully.');
    }
}
