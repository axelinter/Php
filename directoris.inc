<?php

define ("DIRECTORI_BASE",realpath('./Exemples'));

function crear_directori($dir){
		
	mkdir(DIRECTORI_BASE."/".$dir);

}

function esborra_directori($dir){
	$dir = DIRECTORI_BASE."/".$dir;

	$arrayDir=(scandir($dir));


   for ($i=2; $i<count($arrayDir); $i++){
	
	unlink($dir."/".$arrayDir[$i]);

	}
	rmdir($dir);

}

function moure_directori($dir, $rutadesti){
	$rutadesti = DIRECTORI_BASE."/".$rutadesti;
	$dir = DIRECTORI_BASE."/".$dir;
	rename ( $dir, $rutadesti );
}

function copiar_directori($dir, $rutadesti){
	$rutadesti = DIRECTORI_BASE."/".$rutadesti;
	$dir = DIRECTORI_BASE."/".$dir;
	copy ($dir, $rutadesti);
}

//funcion listar los directorios dentro del directorio que escriba el usuario

function llistat($dir) {
   $dir = DIRECTORI_BASE."/".$dir;
	if (!is_dir($dir)){
	echo "No has escrito un directorio valido";
	} else{

	$arrayDir=(scandir($dir));
	for ($i=2; $i<count($arrayDir); $i++){

   if (is_dir($dir.'/'.$arrayDir[$i])){  
	
		echo $arrayDir[$i].'<br>';

			}
		}
	}

}
//funcion saber la ruta del directorio actual
function ruta(){
	echo getcwd();
}
            
function stats_sistema(){

$total_disc=disk_total_space("./");
$total_lliure=disk_free_space("./");
$percent_lliure=($total_lliure/$total_disc)*100;
$percent_ocupat=100-$percent_lliure;
$total_ocupat=$total_disc-$total_lliure;

	echo "La mida total del disc és de " .$total_disc. " bytes ";

	echo "<br>El total lliure és de ".$total_lliure. " bytes ".floor($percent_lliure). "%";

	echo "<br>El total ocupat és de ".$total_ocupat. " bytes ".floor($percent_ocupat). "%";
}            
?>