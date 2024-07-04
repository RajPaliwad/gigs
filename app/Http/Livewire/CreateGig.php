<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;

class CreateGig extends Component
{
    public $company, $title, $location, $email, $website, $tags, $logo, $description;

    public function submit()
    {
        $validatedData = $this->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'tags' => 'required',
            'logo' => 'image|max:1024', // 1MB Max
            'description' => 'required',
        ]);

        // Store listing logic
        Listing::create($validatedData);

        return redirect()->route('listings.index');
    }

    public function render()
    {
        return view('livewire.create-gig');
    }
}
