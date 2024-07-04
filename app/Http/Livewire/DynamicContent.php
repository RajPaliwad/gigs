<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listing;

class DynamicContent extends Component
{
    public $page = 'home'; // Default page
    public $listing; // Listing to be displayed

    protected $listeners = ['navigate'];

    public function navigate($page, $id = null)
    {
        $this->page = $page;
        if ($page === 'listing') {
            $this->listing = Listing::find($id);
        }
    }

    public function render()
    {
        return view('livewire.dynamic-content');
    }
}
