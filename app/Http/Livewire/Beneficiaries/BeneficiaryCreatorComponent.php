<?php

namespace App\Http\Livewire\Beneficiaries;

use App\Models\Organisation;
use App\Models\organisationBeneficiary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BeneficiaryCreatorComponent extends Component
{
    public $beneficiary_name;

    public $beneficiary_desc;

    public $recorder;

    public $org_id;

    public ?organisationBeneficiary $beneficiary = null;

    protected $rules = [
        'beneficiary_name' => 'required|max:100|unique:beneficiaries',
        'beneficiary_desc' => 'max:200',
    ];

    protected $messages = [
        'beneficiary_name.required' => 'Beneficiary name is required',
        'beneficiary_name.max' => 'Beneficiary name is too long',
        'beneficiary_name.unique' => 'Beneficiary name Already taken'
    ];

    public function mount()
    {
        $this->beneficiary = new organisationBeneficiary();
    }

    public function submit()
    {
        $this->validate();

        try{

            DB::beginTransaction();

            $query = $this->beneficiary->storeOrgBeneficiary($this->fieldInputs());

            if($query)
            {
                $this->resetInput();

                DB::commit();

                sleep(3);

                session()->flash('msg', 'Beneficiary Stored');

                return redirect()->route('beneficiary.index');
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    private function fieldInputs()
    {
        $org_ID = $this->org_ID();

        return [
            'beneficiary_name' => htmlspecialchars(trim(ucfirst($this->beneficiary_name))),
            'beneficiary_desc' => htmlspecialchars(trim(ucfirst($this->beneficiary_desc))),
            'recorder' => Auth::user()->email,
            'org_id' => $org_ID['id'],
        ];
    }

    private function resetInput()
    {
        $this->beneficiary_name = '';
        $this->beneficiary_desc = '';
    }

    private function org_ID()
    {
        $user = Auth::user()->email;

        return Organisation::where(['recorder' => $user])
        ->select('id')
        ->firstOrFail()
        ->toArray();
    }
    public function render()
    {
        return view('livewire.beneficiaries.beneficiary-creator-component');
    }
}
