<?php

namespace App\Http\Livewire\Profile;

use App\Models\OrganisationType;
use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileManagerComponent extends Component
{
    public ?OrganisationType $types = null;
    public ?Organisation $organisation = null;

    public $types_data = null;

    public  $org_name;
    public	$org_desc;
    public	$registration_no;
    public	$date_established;
    public  $mission;
    public	$vission;
    public	$motto;
    public	$org_logo;
    public	$org_type;
    public	$recorder;

    protected $rules = [
        'org_name' => 'required|max:100|unique:organisations',
        'org_desc' => 'required|max:1000',
        'registration_no' => 'required|unique:organisations|max:100',
        'date_established' => 'required|date',
        'mission' => 'required|max:200',
        'vission' => 'required|max:200',
        'motto' => 'required|max:200',
        'org_type' => 'required'
    ];

    protected $messages = [
        'org_type.required' => 'Organisation type is required',
        'org_name.required' => 'Orgnisation name is required',
        'org_name.max' => 'Too long organisation name',
        'org_name.unique' => 'Organisation name registered',
        'org_desc.required' => 'Organisation description is required',
        'org_desc.max' => 'Too long description',
        'registration_no.required' => 'Registration No. is required',
        'registration_no.unique' => 'Registration No. must be unique',
        'registration_no.max' => 'Registration No. is Too long',
    ];

    public function mount()
    {
        $this->types = new OrganisationType();

        $this->organisation = new Organisation();

        $this->types_data = $this->types->displayOrgTypes();
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {

        $this->validate();

        try{

            $query = $this->organisation->storeOrgInfo($this->fieldInputs());

            if($query){

                sleep(3);

                session()->flash('msg', 'Organisation information saved successfully');

                return redirect()->route('profile.index');
            }
        }catch(\Exception $e){
            dd($e->getMessage().' Line: '.$e->getLine());
        }
    }

    private function resetInputs()
    {
        $this->org_name = '';
        $this->org_desc = '';
        $this->registration_no = '';
        $this->date_established = '';
        $this->mission = '';
        $this->vission = '';
        $this->org_type = '';
        $this->motto = '';
    }

    private function fieldInputs()
    {
        return  [
            'org_name' => htmlspecialchars(trim(ucfirst($this->org_name))),
            'org_desc' => htmlspecialchars(trim(filter_var($this->org_desc))),
            'registration_no' => htmlspecialchars(trim($this->registration_no)),
            'date_established' => htmlspecialchars(trim($this->date_established)),
            'mission' => htmlspecialchars(trim(ucfirst($this->mission))),
            'vission' => htmlspecialchars(trim(ucfirst($this->vission))),
            'motto' => htmlspecialchars(trim(ucfirst($this->motto))),
            'org_type' => htmlspecialchars(trim($this->org_type)),
            'recorder' => Auth::user()->email
        ];
    }


    public function render()
    {
        return view('livewire.profile.profile-manager-component');
    }
}
