<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    protected $table = "organisations";

    protected $primaryKey = 'id';

    protected $fillable = [
        'org_name',
        'org_desc',
        'registration_no',
        'date_established',
        'mission',
        'vission',
        'motto',
        'org_logo',
        'org_type',
        'recorder',
    ];

    public static function storeOrgInfo(array $data)
    {
        return self::create($data);
    }

    public static function displayOrganizationInfo()
    {
        return self::join('organisation_types', 'organisation_types.id', '=', 'organisations.org_type')
        ->select('organisation_types.name AS type', 'organisations.*')
        ->get()
        ->toArray();
    }


}
