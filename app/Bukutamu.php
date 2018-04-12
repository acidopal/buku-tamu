<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bukutamu extends Model
{
    protected $table = 'bukutamu';
    protected $fillable = ['nama_ortu', 'nama_siswa', 'kelas', 'no_hp', 'foto_bukutamu'];

}
