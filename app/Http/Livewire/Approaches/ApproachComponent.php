<?php

namespace App\Http\Livewire\Approaches;

use App\Models\organisationApproach;
use Livewire\Component;

class ApproachComponent extends Component
{
    public ?organisationApproach $approach = null;

    public $approaches = null;

    public function mount()
    {
        $this->approach = new organisationApproach();

        $this->approaches = $this->approach->displayApproaches();
    }
    public function render()
    {
        // dd($this->approaches);
        return view('livewire.approaches.approach-component');
    }
}
