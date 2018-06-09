<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'gurus';
    protected $fillable = ['nama_guru','jabatan','foto','kurikulum_id'];
    public $timestamps = true;

    public function Kurikulum()
    {
    	return $this->belongsTo('App\Kurikulum','kurikulum_id');
    }
}
