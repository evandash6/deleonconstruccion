<?php

namespace App\Models;

use CodeIgniter\Model;

class servicioModel extends Model
{
    protected $table      = 'servicio';  // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';        // Clave primaria de la tabla

    // Definir los campos que se pueden insertar/actualizar
    protected $allowedFields = [
    'id_cat_servicio',
    'nombre',
    'telefono',
    'servicio',
    'responsable',
    'observaciones',
    'fecha_add',
    'fecha_update'
     ];

    // Si se desea, se pueden agregar validaciones
    protected $validationRules = [
        'nombre'  => 'required|min_length[3]|max_length[50]',
        'telefono'=> 'required|min_length[10]|max_length[15]'
    ];
}


?>