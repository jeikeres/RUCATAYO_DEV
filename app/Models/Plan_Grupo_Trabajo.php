<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan_Grupo_Trabajo extends Model {

		protected $table = 'PLAN_GRUPO_TRABAJO';
		public $primaryKey='ID_GRUPO';
   

     public function proced_bases()
    {
        return $this->hasMany('App\Models\Proced_Base', 'ID_GRUPO_TRABAJO', 'ID_GRUPO');
    }




}
