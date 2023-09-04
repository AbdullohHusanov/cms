<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'user',
        'iabs_id',
        'type_certificate',
        'type_client',
        'name_owner',
        'full_name_director',
        'full_name_accountant',
        'state',
        'city',
        'region',
        'street',
        'email',
        'organization',
        'divisions',
        'inn',
        'pinfl',
        'phone',
        'token_type',
        'serial_number_token',
        'document_file',
    ];
}
