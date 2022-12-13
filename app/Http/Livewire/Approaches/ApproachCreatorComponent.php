<?php

namespace App\Http\Livewire\Approaches;

use App\Models\Organisation;
use App\Models\organisationApproach;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ApproachCreatorComponent extends Component
{

    public $approach_name;

    public $approach_desc;

    public $recorder;

    public $org_id;

    public ?organisationApproach $approach = null;

    protected $rules = [
        'approach_name' => 'required|max:100|unique:approaches',
        'approach_desc' => 'max:200',
    ];

    protected $messages = [
        'approach_name.required' => 'Approach name is required',
        'approach_name.max' => 'Approach name is too long',
        'approach_name.unique' => 'Approach name Already taken'
    ];


    public function mount()
    {
        $this->approach = new organisationApproach();
    }


    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        try{

            DB::beginTransaction();

            $query = $this->approach->storeOrgApproach($this->fieldInputs());

            if($query)
            {
                $this->resetInput();

                DB::commit();

                sleep(3);

                session()->flash('msg', 'Approach Stored');

                return redirect()->route('org.approaches');
            }
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }

    private function fieldInputs()
    {
        $org_ID = $this->org_ID();

        return [
            'approach_name' => htmlspecialchars(trim(ucfirst($this->approach_name))),
            'approach_desc' => htmlspecialchars(trim(ucfirst($this->approach_desc))),
            'recorder' => Auth::user()->email,
            'org_id' => $org_ID['id'],
        ];
    }

    private function resetInput()
    {
        $this->approach_name = '';
        $this->approach_desc = '';
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
        return view('livewire.approaches.approach-creator-component');
    }
}
