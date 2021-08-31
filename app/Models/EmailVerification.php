<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    use HasFactory;

    protected $guarded=[];

    public $incrementing = false;
    protected $primaryKey='email';
    protected $keyType = 'string';
    public const UPDATED_AT = null;

    public function user()
    {
        return $this->hasOne(User::class,'email', 'email');
    }
}
