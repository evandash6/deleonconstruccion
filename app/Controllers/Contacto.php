<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ContactoModel;

class Contacto extends BaseController
{
    //funcion para vaciar tabla contactos
    public function deleteContacto()
    {
        //creamos la instancia para usar el modelo
        $modelo = new ContactoModel();
        
        //llamamos la funcion vaciar tabla del modelo y validamos operaciones
         if ($modelo->vaciarTabla()) {
            echo "Registro eliminado correctamente";
        } else {
            echo "Error al eliminar el registro";
        }  
    }
}