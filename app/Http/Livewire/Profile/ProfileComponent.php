<?php

namespace App\Http\Livewire\Profile;

use App\Models\Organisation;
use Livewire\Component;

class ProfileComponent extends Component
{

    public ?Organisation $organisation = null;

    public $org_data = null;

    public function mount()
    {
        $this->organisation = new Organisation();

        $this->org_data = $this->organisation->displayOrganizationInfo();
    }

    public function render()
    {
        // dd($this->org_data);
        return view('livewire.profile.profile-component');
    }
}
