<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $table = 'kurikulums';
    protected $fillable = ['nama_kurikulum','ket_kurikulum','nama_kepsek','nama_wkepsek'];
    public $timestamps = true;

    public function Guru()
    {
    	return $this->hasMany('App\Guru','kurikulum_id');
    }

    public function Staf()
    {
    	return $this->hasMany('App\Staf','kurikulum_id');
    }
}
