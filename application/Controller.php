<?php

/*
 * -------------------------------------
 * PHPMaya 1.0 - Main controller
 * -------------------------------------
 */


abstract class Controller
{
    protected $_view;
    
    public function __construct() {
        $this->_view = new View(new Request);
    }

    protected function loadModel($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }
    
    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }

    protected function addAudit($type,$params){
  
        $auditModel = $this->loadModel('audit');

        if(!empty($_SESSION['user'])){
            $user_id = $_SESSION['user']['id'];
            $cif = $_SESSION['user']['cif'];
            $name = $_SESSION['user']['name'];
        }else{
            $user_id = "";
            $cif = "";
            $name = "";
        }
        switch ($type) {

            // PAYMENTS
            case _AT_ADD_PAYMENT:
                $title = "PAGO CREADO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_SAVE_PAYMENT:
                $title = "PAGO EDITADO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_DELETE_PAYMENT:
                $title = "PAGO ELIMINADO";
                $text = "Registro: ".json_encode($params);
            break;
            

            // NOTIFICATIONS
            case _AT_ADD_NOTIFICATION:
                $title = "NOTIFICACION CREADA";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_SAVE_NOTIFICATION:
                $title = "NOTIFICACION EDITADA";
                $text = "Registro: ".json_encode($params);
            break;            
            case _AT_DELETE_NOTIFICATION:
                $title = "NOTIFICACION ELIMINADA";
                $text = "Registro: ".json_encode($params);
            break;


            // USER
            case _AT_ADD_USER:
                $title = "USUARIO CREADO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_SAVE_USER:
                $title = "USUARIO EDITADO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_DELETE_USER:
                $title = "USUARIO ELIMINADO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_LOGIN_USER:
                $title = "LOGIN DE USUARIO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_LOGOUT_USER:
                $title = "LOGOUT DE USUARIO";
                $text = "Registro: ".json_encode($params);
            break;


            // EMAIL
            case _AT_SENDNORMAL_EMAIL:
                $title = "ENVIO DE EMAIL MANUAL";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_SENDSECONDFORM_EMAIL:
                $title = "ENVIO DE EMAIL DE SEGUNDO FORMULARIO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_SENDACTIVATION_EMAIL:
                $title = "ENVIO DE EMAIL DE ACTIVACION";
                $text = "Registro: ".json_encode($params);
            break;

            
            // PERMISSION
            case _AT_ADD_PERMISSION:
                $title = "PERMISO CREADO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_SAVE_PERMISSION:
                $title = "PERMISOS CAMBIADOS PARA USUARIO";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_DELETE_PERMISSION:
                $title = "PERMISO ELIMINADO";
                $text = "Registro: ".json_encode($params);
            break;

            
            // POLL
            case _AT_ADD_POLL:
                $title = "ENCUESTA CREADA";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_SAVE_POLL:
                $title = "ENCUESTA EDITADA";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_DELETE_POLL:
                $title = "ENCUESTA ELIMINADA";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_COMPLETED_POLL:
                $title = "ENCUESTA COMPLETADA POR USUARIO";
                $text = "Registro: ".json_encode($params);
            break;


            // QUERY
            case _AT_SENDED_QUERY:
                $title = "ENVIO DE CONSULTA DE USUARIO";
                $text = "Registro: ".json_encode($params);
            break;


            // UPLOAD
            case _AT_ADD_IMAGE:
                $title = "IMAGEN SUBIDA PARA NOTIFICACION";
                $text = "Registro: ".json_encode($params);
            break;
            case _AT_DELETE_IMAGE:
                $title = "IMAGEN DE NOTIFICACION ELIMINADA";
                $text = "Registro: ".json_encode($params);
            break;


            // ZONE
            case _AT_SAVE_ZONE:
                $title = "ZONAS EDITADAS";
                $text = "Registro: ".json_encode($params);
            break;

            // GENERAL
            default:
                $title = "Registro de auditoria";
                $text = json_encode($params);
                $type = _AT_GENERAL;
            break;
        }

        $data = array(
            'title'     => $title,
            'text'      => $text,
            'cif'       => $cif,
            'name'      => $name,
            'user_id'   => $user_id,
            'type'      => $type
        );          
        $auditRows = $auditModel->add($data); 
    }
}

?>
