<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    //
    protected $fillable = ['nipg','foto','nama_guru','jenis_kelamin','tanggal_lahir','id_mapel','alamat','no_telepon'];
    protected $visible = ['nipg','foto','nama_guru','jenis_kelamin','tanggal_lahir','id_mapel','alamat','no_telepon'];
    public $timestamps=true;

    public function mapel()
    {
    	return $this->belongsTo('App\mapel', 'id_mapel');
    }
}
