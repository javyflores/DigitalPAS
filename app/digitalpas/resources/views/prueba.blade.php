@extends('layouts.afilplantilla')
@section('contenido')
<div>
	<h2>Nómina de Afiliados</h2>
    <div class="table-responsive">
    <table class="table table-bordered">
	    <thead>
	        <tr>
                <th>Estado</th>
                <th>Seccional</th>
                <th>Cédula</th>
                <th>ID</th>
                <th>1er Nombre</th>
                <th>2do Nombre</th>
                <th>1er Apellido</th>
                <th>2do Apellido</th>
                <th>Fecha de Nac.</th>
                <th>Sexo</th>
                <th>Edo. Cívil</th>
                <th>Hijos</th>
                <th>Discapacidad</th>
                <th>Grado Disc.</th>
                <th>Nivel Aca.</th>
                <th>Prof. u Oficio</th>
	        </tr>
	    </thead>
	    <tbody>
	        @foreach($datos as $dato)
	        <tr>
                <td>{{ $dato->edo }}</td>
                <td>{{ $dato->cod_sec }}</td>
                <td>{{ $dato->cedula }}</td>
                <td>{{ $dato->id_afi }}</td>
                <td>{{ $dato->p_nombre }}</td>
                <td>{{ $dato->s_nombre }}</td>
                <td>{{ $dato->p_apellido }}</td>
                <td>{{ $dato->s_apellido }}</td>
                <td>{{ $dato->fec_nac }}</td>
                <td>{{ $dato->sexo }}</td>
                <td>{{ $dato->est_civ }}</td>
                <td>{{ $dato->hijos }}</td>
                <td>{{ $dato->discap }}</td>
                <td>{{ $dato->gra_disc }}</td>
                <td>{{ $dato->niv_aca }}</td>
                <td>{{ $dato->prof_ofc }}</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>
	</div>
</div>
@endsection