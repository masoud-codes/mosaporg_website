<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organisationApproach extends Model
{
    use HasFactory;

    protected $table = 'approaches';

    protected $fillable = [
        'approach_name',
        'approach_desc',
        'recorder',
        'org_id'
    ];


    public static function storeOrgApproach(array $data)
    {
        return self::create($data);
    }

    public static function displayApproaches()
    {
        return self::orderBy('approach_name', 'asc')
        ->get()
        ->toArray();
    }
}
