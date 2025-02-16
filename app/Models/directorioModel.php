<?php

namespace App\Models;

use CodeIgniter\Model;

class directorioModel extends Model
{
    protected $table      = 'directorio';  // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';        // Clave primaria de la tabla

    // Definir los campos que se pueden insertar/actualizar
    protected $allowedFields = [
        'cve_ent',
        'id_municipio',
        'id_oficio',
        'nombre_empresa',
        'nombre',
        'telefono',
        'correo',
        'direccion',
        'descripcion_empresa',
        'foto1',
        'foto2',
        'fecha_add',
        'fecha_edit',
        'activo'
     ];

    // Si se desea, se pueden agregar validaciones
    protected $validationRules = [
        'nombre'  => 'required|min_length[3]|max_length[50]',
        'telefono'=> 'required|min_length[10]|max_length[15]'
    ];
}


?>