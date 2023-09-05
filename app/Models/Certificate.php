<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';

    protected $fillable = [
        'ca_id',
        'issuer',
        'cert_sn',
        'cert_thumb',
        'cert_from',
        'cert_to',
        'base64',
        'pfx',
        'cng',
        'type',
        'status',
        'imported',
        'rev_reason',
        'branch_rev_status',
        'file_name',
        'last_login',
        'sync',
        'req_id',
        'branch_user_id',
        'operator_id',
        'client_id',
        'user_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
