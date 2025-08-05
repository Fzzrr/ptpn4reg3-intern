<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'm_grade';  // nama tabel
    protected $fillable = ['nama_grade', 'jenis', 'created_at'];
    public $timestamps = false;  // karena tabel tidak menggunakan created_at  dan updated_at otomatis Laravel
}
