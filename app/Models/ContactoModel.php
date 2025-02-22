<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactoModel extends Model
{
    protected $table      = 'contacto';  // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id';        // Clave primaria de la tabla

    // Definir los campos que se pueden insertar/actualizar
    protected $allowedFields = ['nombre', 'telefono','correo','comentarios','fecha_add' ];

    // Si se desea, se pueden agregar validaciones
    protected $validationRules = [
        'nombre'  => 'required|min_length[3]|max_length[50]',
        'correo'   => 'required|valid_email',
        'telefono'=> 'required|min_length[10]|max_length[15]'
    ];

    public function vaciarTabla()
    {
         
        //vacia y reinicia los id
         return self::truncate();
        
    }
    
}


?>