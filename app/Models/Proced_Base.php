<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proced_Base extends Model {

		protected $table = 'PROCED_BASE';
		public $primaryKey='ID_PROCEDIMIENTO';
   
   
   
       public function plan()
    {
        return $this->belongsTo('App\Models\Plan_Grupo_Trabajo');
    }



}


