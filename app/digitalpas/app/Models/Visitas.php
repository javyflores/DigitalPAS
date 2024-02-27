<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Visitas extends Model
{
    use HasFactory;

    protected $table = 'gestion.visitas';
    protected $primaryKey = 'req';
    public $timestamps = false;

    public static function getNuevasVisitas()
    {

    	$id_afi = Session::get('id_afi');

        $nuevasVisitas = Visitas::where('fec_crea', '>', now()->subDay())->get();
        
        return $nuevasVisitas;
    }


}