<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organisationBeneficiary extends Model
{
    use HasFactory;


    protected $table = 'beneficiaries';

    protected $fillable = [
        'beneficiary_name',
        'beneficiary_desc',
        'recorder',
        'org_id'
    ];


    public static function storeOrgBeneficiary(array $data){
        return self::create($data);
    }

    public static function displayBeneficiaries(){
        return self::orderBy('beneficiary_name', 'asc')
        ->get()
        ->toArray();
    }
}
