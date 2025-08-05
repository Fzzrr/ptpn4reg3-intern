<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users'; // nama tabel yang Anda gunakan

    protected $primaryKey = 'username'; // jika username jadi primary key
    public $incrementing = false; // jika primary key bukan auto increment
    protected $keyType = 'string'; // tipe data primary key
    
    public $timestamps = false;

    protected $fillable = ['username', 'password', 'level', 'kodeunit',];

    // Jika password bukan enkripsi, jangan hash di mutator atau verifikasi manual
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, "kodeunit", "kodeunit");
    }
}
