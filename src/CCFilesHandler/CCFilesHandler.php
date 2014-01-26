<?php 
/** 
* A user controller to manage content. 
* 
* @package MuffinPHP Core 
*/ 
class CCFilesHandler extends CObject implements IController { 


/** 
* Constructor 
*/ 
public function __construct() { parent::__construct(); } 


/** 
* Show a listing of all content. 
*/ 
public function Index() { 
	// $content = new CMContent(); 
	$this->views->SetTitle('Content Controller');
	$this->views->AddInclude(__DIR__ . '/index.tpl.php', array( 
	// 'contents' => $content->ListAll(),
	// 'testData' => CTextFilter::testlibrary(),	
)); 

} 


public function uploadFile(){

	echo "<br><br><br><br><br><br>";

	$cadenatexto = $_POST["cadenatexto"];
	echo "Escribió en el campo de texto: " . $cadenatexto . "<br><br>";


	$allowedExts = array(
	  "pdf", 
	  "doc", 
	  "docx"
	); 

	$allowedMimeTypes = array( 
	  'application/msword',
	  'text/pdf',
	  'image/gif',
	  'image/jpeg',
	  'image/png'
	);
	var_dump($_FILES);
	//datos del arhivo
	$nombre_archivo = $_FILES['userfile']['name'];
	$tipo_archivo = $_FILES['userfile']['type'];
	$tamano_archivo = $_FILES['userfile']['size'];

	// $extension = end(explode(".", $_FILES["userfile"]["name"]));

	// if ( 200000 < $_FILES["userfile"]["size"]  ) {
	//   die( 'Please provide a smaller file [E/1].' );
	// }

	// if ( ! ( in_array($extension, $allowedExts ) ) ) {
	//   die('Please provide another file type [E/2].');
	// }

	// if (in_array( $_FILES["userfile"]["type"], $allowedMimeTypes)){
	// 	move_uploaded_file($_FILES['userfile']['tmp_name'], MUFFINPHP_SITE_PATH."/data/".$nombre_archivo);
	// 	echo "El archivo ha sido cargado correctamente.";
	// } else{
	// 	echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
	    
	// }




		echo MUFFINPHP_SITE_PATH."/data/";
	    if (move_uploaded_file($_FILES['userfile']['tmp_name'], MUFFINPHP_SITE_PATH."/data/".$nombre_archivo)){
	       echo "El archivo ha sido cargado correctamente.";
	    }else{
	       echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
	    }


}



}