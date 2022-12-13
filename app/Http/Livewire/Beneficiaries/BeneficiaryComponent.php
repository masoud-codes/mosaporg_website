<?php

namespace App\Http\Livewire\Beneficiaries;

use App\Models\organisationBeneficiary;
use Livewire\Component;

class BeneficiaryComponent extends Component
{

    public ?organisationBeneficiary $beneficiary = null;

    public $beneficiaries = null;


    public function mount()
    {
        $this->beneficiary = new organisationBeneficiary();

        $this->beneficiaries = $this->beneficiary->displayBeneficiaries();
    }
    public function render()
    {
        return view('livewire.beneficiaries.beneficiary-component');
    }
}
