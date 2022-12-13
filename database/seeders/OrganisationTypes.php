<?php

namespace Database\Seeders;

use App\Models\OrganisationType;
use Illuminate\Database\Seeder;

class OrganisationTypes extends Seeder
{
    protected $org_types = [
        [
            'name' => 'GO',
            'desc' => 'Government organization'
        ],
        [
            'name' => 'NGO',
            'desc' => 'Non Government organization'
        ],
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->org_types as $items){OrganisationType::create($items);}
    }
}
