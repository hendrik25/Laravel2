<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DataCuti extends Model
{
    use HasFactory;
    protected $table = 'data_cutis';
    protected $primaryKey = 'id_cuti';
    public $timestamps = true;

    protected $fillable = [
        'nik',
        'nama_cuti',
        'periode',
        'hak_cuti',
        'cuti_diambil',
        'sisa_cuti',
    ];

    public function admin(){
        return $this->hasOne(Admin::class, 'nik', 'nik');
    }
}
