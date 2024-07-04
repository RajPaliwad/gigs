<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;

class EditGig extends Component
{
    public $listing;
    public $company, $title, $location, $email, $website, $tags, $logo, $description;

    protected $rules = [
        'company' => 'required',
        'title' => 'required',
        'location' => 'required',
        'email' => 'required|email',
        'website' => 'required|url',
        'tags' => 'required',
        'logo' => 'image|max:1024', // 1MB Max
        'description' => 'required',
    ];

    public function mount(Listing $listing)
    {
        $this->listing = $listing;

        $this->company = $listing->company;
        $this->title = $listing->title;
        $this->location = $listing->location;
        $this->email = $listing->email;
        $this->website = $listing->website;
        $this->tags = $listing->tags;
        $this->description = $listing->description;
    }

    public function submit()
    {
        $validatedData = $this->validate();

        // Update listing logic
        $this->listing->update($validatedData);

        return redirect()->route('listings.index');
    }

    public function render()
    {
        return view('livewire.edit-gig');
    }
}
