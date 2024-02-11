<?php
/* Este modelo fue creado como referencia */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table = 'nomina.afiliados';

    public function datosLaborales()
    {
        return $this->hasOne(DatosLaborales::class, 'id_afi', 'id_afi');
    }

    public function datosContacto()
    {
        return $this->hasOne(DatosContacto::class, 'id_afi', 'id_afi');
    }

    public function datosHijos()
    {
        return $this->hasOne(DatosHijos::class, 'id_afi', 'id_afi');
    }
}


class DatosLaborales extends Model
{
    protected $table = 'nomina.dat_lab_afi';

    public function nomina()
    {
        return $this->belongsTo(Nomina::class, 'id_afi', 'id_afi');
    }
}


class DatosContacto extends Model
{
    protected $table = 'nomina.dat_cont_afi';

    public function nomina()
    {
        return $this->belongsTo(Nomina::class, 'id_afi', 'id_afi');
    }
}

class DatosHijos extends Model
{
    protected $table = 'nomina.datos_hijos_afi';

    public function nomina()
    {
        return $this->belongsTo(Nomina::class, 'id_afi', 'id_afi');
    }
}




