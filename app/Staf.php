<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $table = 'stafs';
    protected $fillable = ['nama_staf','jabatan','kurikulum_id'];
    public $timestamps = true;

    public function Kurikulum()
    {
    	return $this->belongsTo('App\Kurikulum','kurikulum_id');
    }
}
