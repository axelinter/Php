<?php


//Pablo y Axel Dam2


function find_fitxer($fitxer, $dir)
{
	$dir = DIRECTORI_BASE."/".$dir;
    $files = scandir($dir);
    
        foreach ($files as $fileToFind) {
            if (is_file($dir ."/". $fileToFind)) {
                if ($fitxer == $fileToFind) {
                    echo "Archivo encontrado correctamente";
                }else{
				echo "Archivo no encontrado";
				}
            }
        }
    
   }

function stats_fitxer($fitxer)
{
	
	if ($fitxer != null) {
        if (file_exists($fitxer)) {
            $estados = stat($fitxer);
			echo "El ultimo acceso al fichero a sido: " . gmdate("d-m-Y H:i:s",$estados['atime']) . " El tamaño (bytes) del archivo es de : " . $estados['size'] . " y su propietario es(Id): " .$estados['uid'] ;
            
        } else {
			echo "Error archivo no existente";
			}
    
}
}
function esborra_fitxer($fitxer)
{
    
	if (file_exists($fitxer)) {
                if (unlink($fitxer)) {
                    echo "Archivo borrado correctamente";
                } else {
                   echo "Error critico al borrar el fichero";
                }
             
        } else {
           echo "fichero no existente";
        }
}
function mou_fitxer($fitxer, $rutadesti)
{
	
        if (file_exists($fitxer)) {
            if (rename($fitxer, $rutadesti)) {
                echo "El fichero ha sido movido correctamente";
            } else {
                echo "Error critico al mover el archivo";
            }
        } else {
            echo "El fichero no existe";
        }
    
}
function copia_fitxer($fitxer, $rutadesti)
{
   if (file_exists($fitxer)) {
            if (copy($fitxer, $rutadesti)) {
                echo "El fichero ha sido copiado correctamente";
            } else {
                echo "Error critico al copiar el archivo";
            }
        } else {
            echo "El fichero no existe";
        }
}
function crea_modifica_fitxer($fitxer, $contingut)
{
  
    if ($fitxer != null && $contingut != null) {
        if (!file_exists($fitxer) && empty($contingut)) {
            if (touch($fitxer)) {
                echo "El fichero se ha creado";
            } else {
                echo "Error critico 001";
            }
        } else if (!file_exists($fitxer) && !empty($contingut)) {
            if (touch($fitxer)) {
                $file = fopen($fitxer, "w");
                fwrite($file, $contingut);
                fclose($file);
                echo "El fichero se ha creado correctamente y se le ha añadido texto";
            } else {
                echo "Error critico 002";
            }
        } else if (file_exists($fitxer) && !empty($contingut)) {
            $file = fopen($fitxer, "w");
            fwrite($file, $contingut);
            fclose($file);
            echo "El fichero se le ha actualizado el texto ";
        } else {
            echo "Error critico 003";
        }
    } else {
        echo "Nombre de fichero o datos erroneos";
    }
}
function our_sha1($fitxer){
    if (file_exists($fitxer)) {
        echo sha1_file($fitxer);
        
    } else {
        echo "Error al devolver datos de sha1";
    }
}
function our_md5($fitxer){
    if (file_exists($fitxer)) {
        echo md5_file($fitxer);
       
    } else {
        echo "Error al devolver datos de md5";
    }
}