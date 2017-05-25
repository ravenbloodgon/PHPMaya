<?php

class indexController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {

    	// Load model
    	$myModel = $this->loadModel("mymodel");

    	// Params Array
    	$data = array(
    		"MyParam" => 1
    	);

    	// Call model function
	 	$this->_view->example = $myModel->query($data); 
        
	 	// Render View
        $this->_view->renderizar('index', 'Hello world!!!');        
    }
}

?>