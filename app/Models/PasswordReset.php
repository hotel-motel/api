<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    protected $guarded=[];
    public $incrementing=false;
    protected $primaryKey='email';
    public const UPDATED_AT = null;

    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }

    public static function generate(User $user)
    {

        return self::updateOrCreate(
            ['email'=>$user->email],
            ['token'=> mt_rand(100000, 999999)]
        );
    }
}
