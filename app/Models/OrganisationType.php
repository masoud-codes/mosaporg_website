<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisationType extends Model
{
    use HasFactory;

    protected $table = 'organisation_types';

    protected $fillable = [
        'name',
        'desc'
    ];

    public function displayOrgTypes()
    {
        return self::orderBy('name', 'DESC')->get()->toArray();
    }
}
