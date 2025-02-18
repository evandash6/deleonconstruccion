<?php

namespace App\Controllers;
use CodeIgniter\Controller;
// use Config\Database;
use App\Models\directorioModel;


class Home extends BaseController
{
    //Principal de la pagina.
    public function index()
    {

       // Cargar la base de datos
       $db = \Config\Database::connect();
       $arr = [];
        
       // Realizar una consulta para obtener los estados.
       $builder = $db->table('c_estado');
       $query_estado = $builder->get();

        $c_estado = $query_estado->getResult();

        //Consultamos los oficio
        $c_oficio = $db->table('c_oficio');
        $resOficio = $c_oficio->where('activo', '1')->get()->getResult();

        $arr=['tb_estado'=>$c_estado,'c_oficio'=>$resOficio];

        echo view('construccion/index', $arr);
        echo view('construccion/index_js');
    }

    //cargar catalogos de municipios dependiendo del estado seleccionado
    public function municipios($cve_ent=0){

        $arr=[];

        // Cargar la base de datos
       $db = \Config\Database::connect();

        $builder = $db->table('c_municipio');
        $registros = $builder->where('cve_ent', $cve_ent)->get()->getResult();

        $arr = ['estatus'=>200, 'municipio'=>$registros];

        echo json_encode($arr);


    }

    //Guardar directorio
    public function guardaDirectorio(){
        // Crear una instancia del modelo
        $directorioModel = new directorioModel();

        $arr = [];

        if($this->request->getMethod()=='post'){

            $rutaDestino = WRITEPATH . 'uploads/imagenes';

            //Variables para guardar
            $cve_ent=$this->request->getPost('cve_ent');
            $id_municipio=$this->request->getPost('id_municipio');
            $id_oficio=$this->request->getPost('id_oficio');
            $nombre_empresa=$this->request->getPost('nombre_empresa');
            $nombre=$this->request->getPost('nombre');
            $telefono=$this->request->getPost('telefono');
            $correo=$this->request->getPost('correo');
            $direccion=$this->request->getPost('direccion');
            $descripcion_empresa=$this->request->getPost('descripcion_empresa');
            $foto1=$this->request->getFile('foto1');
            $foto2=$this->request->getFile('foto2');
            $fecha_add=$this->request->getPost('fecha_add');
            $fecha_edit=$this->request->getPost('fecha_edit');
            $activo=$this->request->getPost('activo');

            //Validamos los ciertos errores al guardar la imagen.
            //Imagen 1
            if (!in_array($foto1->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])) {

                $arr=['estatus'=>500,'respuesta'=>'Formato de la imagen 1 no es permitido. Solo JPEG, PNG o JPG.'];

                //return "Formato no permitido. Solo JPEG, PNG o JPG.";
            //Imagen 2
            }else if(!in_array($foto2->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg'])){

                $arr=['estatus'=>500,'respuesta'=>'Formato de la imagen 2 no es permitido. Solo JPEG, PNG o JPG.'];

            }else{

                //Si los formatos de las imagenes son correctas, procedemos a guardar las imagenes en la carpeta correspondiente.
                //deleonconstruccion/public/uploads/imgs/

                //movemos las imagenes y las renombramos
                //Renombramos
                $namefoto1 = $foto1->getRandomName();
                $namefoto2 = $foto2->getRandomName();

                //movemos
                $move1 = $foto1->move(ROOTPATH.'/public/uploads/imgs/',$namefoto1);
                $move2 = $foto2->move(ROOTPATH.'/public/uploads/imgs/',$namefoto2);

                //verificamos que el guardado de las imagenes sean correctas.
                if($move1 && $move2){


                    //Guardamos la información dentro de la base de datos, para poder consultar mas tarde.
                    //Creamos el arreglo en donde se guardara la información.
                    $data=[
                        'cve_ent'=>$cve_ent,
                        'id_municipio'=>$id_municipio,
                        'id_oficio'=>$id_oficio,
                        'nombre_empresa'=>$nombre_empresa,
                        'nombre'=>$nombre,
                        'telefono'=>$telefono,
                        'correo'=>$correo,
                        'direccion'=>$direccion,
                        'descripcion_empresa'=>$descripcion_empresa,
                        'foto1'=>$namefoto1,
                        'foto2'=>$namefoto2,
                        'fecha_add'=>date('Y-m-d', time()),
                        'activo'=>1

                    ];

                    //enviamos la información a la base de datos
                     // Insertar los datos en la base de datos
                    if ($directorioModel->save($data)) {

                        $arr = ['estatus'=>200,'respuesta'=>'La información proporcionada fue guardada correctamente dentro de nuestro directorio'];

                        //Espacio para el envio de correo electronico al usuario y a los involuicrados

                    } else {

                        $arr = ['estatus'=>500,'error'=>'Error al guardar la información en el directorio, intentar más tarde.'];

                        //Espacio para la notificación del correo de error al guardar.

                    }

                }else{

                    $arr=['estatus'=>500, 'error'=>'Error al guardar las imagenes, intente más tarde'];

                }

                
            }
           

        }
        else{
            $arr=['estatus'=>500, 'error'=>'Error al recibir los parametros'];
        }

        echo json_encode($arr);
    }

    /**
     * Funsión para buscar a las personas con diferentes oficio
     */
    public function buscarDirectorio(){

        $arr = [];

        if($this->request->getMethod()=='post'){

            $estado = $this->request->getPost('b_cve_ent');
            $municipio = $this->request->getPost('b_id_municipio');
            $oficio = $this->request->getPost('b_id_oficio');

            $comodin_oficio ="";
            $comodin_estado = "";
            $comodin_municipio = "";
            
            if($oficio==""){
                $comodin_oficio="";
            }else{
                $comodin_oficio = " AND o.id =".$oficio." "; 
            }

            if($estado==""){
                $comodin_estado = "";
            }else{
                $comodin_estado= " AND e.cve_ent = '".$estado."' ";
            }

            if($municipio==""){
                $comodin_municipio="";
            }else{
                $comodin_municipio= " AND m.id =  ".$municipio." ";
            }



            //Realizamos el query
            $query = "SELECT
                        e.nom_ent,
                        m.nom_mun,
                        o.oficio,
                        d.nombre_empresa,
                        d.nombre,
                        d.correo,
                        d.telefono,
                        d.direccion,
                        d.id as id_directorio	 
                    FROM
                        directorio d
                        INNER JOIN c_estado e ON e.id = d.cve_ent
                        INNER JOIN c_municipio m ON m.id = d.id_municipio
                        INNER JOIN c_oficio o ON o.id = d.id_oficio 
                    WHERE
                    d.id=d.id".$comodin_estado." ".$comodin_municipio." ".$comodin_oficio." AND d.activo = 1 ORDER BY e.nom_ent DESC, d.nombre_empresa ASC ";
                        
                        //d.id=d.id ".$comodin_estado." AND d.activo = 1 ".$comodin_oficio." ORDER BY d.nombre_empresa ASC";
//.$comodin_municipio
            //Conectamos a la base de datos
            $db = \Config\Database::connect();

            //Consultamos
            $consulta = $db->query($query);
            $res = $consulta->getResult();

            //Creamos la tabla para la salida de la información
            $table = "<p><table id='dt-oficios' class='display table table-bordered' style='width:100%'>
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Dirección</th>
                            <th>Oficio</th>
                            <th>Empresa</th>
                            <th>Teléfono</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>";
            $table .= "<tbody>";
            if($res){
                foreach($res as $rows){
                    $table .="<tr>
                        <td>".$rows->nom_ent."</td>
                        <td>".$rows->nom_mun."</td>
                        <td>".$rows->direccion."</td>
                        <td>".$rows->oficio."</td>
                        <td>".$rows->nombre_empresa."</td>
                        <td>".$rows->telefono."</td>
                        <td>
                        <button onClick='detalle($rows->id_directorio)'class='def-btn btn-detalle form-button' title='Ver detalle de la empresa'><i class='fa fa-eye'></i></button>
                        </td>
                    </tr>";
                } 
            }
        $table .="</tbody>";
        $table.="</table></p>";
            

            $arr=['estatus'=>200, 'table'=>$table];



        }else{

            $arr=['estatus'=>500,'error'=>'Error al recibir la información'];

        }

        echo  json_encode($arr);
    }

    //Funsión para los detalles del servicio seleccionado
    public function detalleServicio($id=0){

        $arr = [];

        //Realizamos la consulta del detalle del oficio seleccionado
        if($id){

            $query="SELECT
                    e.nom_ent,
                    m.nom_mun,
                    o.oficio,
                    d.*
                FROM
                    directorio d
                    INNER JOIN c_estado e ON e.id = d.cve_ent
                    INNER JOIN c_municipio m ON m.id = d.id_municipio
                    INNER JOIN c_oficio o ON o.id = d.id_oficio 
                WHERE
                d.id=".$id." AND d.activo=1";

        //Conectamos a la base de datos
        $db = \Config\Database::connect();

        //Consultamos
        $consulta = $db->query($query);
        $res = $consulta->getResult();

        $arr=['estatus'=>200,'respuesta'=>$res];


        }else{

            /**
             * Espacio para el envio de los correos de error
             */
            $arr=['estatus'=>500,'error'=>'No se puede contultar el detalle del oficio, intente más tarde.'];
        } 


        

        echo json_encode($arr);

    }

   
}
