<?php 
/*namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Files\File;
use Config\Database;*/

namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;
use App\Models\ContactoModel;
use App\Models\servicioModel;

class Email extends Controller{

    public function __construct(){

    }

    public function contacto(){

        $arr = [];

        if($this->request->getMethod()=="post"){

            // Obtener los datos del formulario
            $nombre   = $this->request->getPost('nombre');
            $telefono = $this->request->getPost('telefono');
            $correo    = $this->request->getPost('correo');
            $comentarios  = $this->request->getPost('comentarios');

            // Crear una instancia del modelo
            $ContactoModel = new ContactoModel();

            // Datos que se van a insertar
            $data = [
                'nombre'  => $nombre,
                'telefono'   => $telefono,
                'correo'=> $correo,
                'comentarios'=>$comentarios,
                'atendido'=>0,
                'fecha_add'=>date('Y-m-d', time())
            ];
            
             // Insertar los datos en la base de datos
            if ($ContactoModel->save($data)) {

                $arr = ['estatus'=>200];

                //Espacio para el envio de correo electronico al usuario y a los involuicrados

            } else {

                $arr = ['estatus'=>500];

                //Espacio para la notificación del correo de error al guardar.

            }

            
        }else{

            $arr = ['estatus'=>500];

        }

    
        echo json_encode($arr);

    }

    public function servicios(){

        $arr=[];

        if($this->request->getMethod()=="post"){

            //$arr=['estatus'=>200, 'respuesta'=>$this->request->getPost()];

            // Obtener los datos del formulario
            $id_cat_servicio = $this->request->getPost('id_c_servicio');
            $nombre = $this->request->getPost('nombre');
            $telefono= $this->request->getPost('telefono');
            $servicio= "";
            $responsable= "";

            // Crear una instancia del modelo
            $servicioModel = new servicioModel();

            // Datos que se van a insertar
            $data = [
                'id_cat_servicio'=>$id_cat_servicio,
                'nombre'=>$nombre,
                'telefono'=> $telefono,
                'servicio'=>$servicio,
                'fecha_add'=>date('Y-m-d', time()),
                'responsable'=>$responsable              
            ];
            
             // Insertar los datos en la base de datos
            if ($servicioModel->save($data)) {

                $arr = ['estatus'=>200];

                //return redirect()->to('/usuario/success'); // Redirigir a una página de éxito

            } else {

                $arr = ['estatus'=>500];

                //return redirect()->to('/usuario/error'); // Redirigir a una página de error

            }

        }else{

            $arr=['estatus'=>500];
        }

        echo  json_encode($arr);

    } 

}