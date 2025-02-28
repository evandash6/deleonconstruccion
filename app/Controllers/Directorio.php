<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\directorioModel;

class Directorio extends BaseController
{
   //funcion para vaciar tabla contactos
   public function deleteDirectorio()
   {
       //creamos la instancia para usar el modelo
       
       $modeloDirectorio  = new directorioModel();
       
       //llamamos la funciondeleteTabla del modelo y validamos operaciones
        if ($modeloDirectorio->vaciarTabla()) {
           echo "Registro eliminado correctamente";
       } else {
           echo "Error al eliminar el registro";
       }  
   }
}
