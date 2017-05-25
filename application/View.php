<?php

/*
 * -------------------------------------
 * PHPMaya 1.0 - View Class
 * -------------------------------------
 */

class View
{
    private $_controlador;
    
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        $this->_constants = get_defined_constants(true)['user'];
    }
    
    public function renderizar($vista, $item = false)
    {
        
        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            'ruta_js' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/js/'
        );
        
        $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.php';

        if(is_readable($rutaView)){
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } 
        else {
            throw new Exception('Error de vista');
        }
    }
}

?>
