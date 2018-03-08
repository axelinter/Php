<?php
	
	include_once("directoris.inc");
	include_once("arxius.inc");
	
		//variable que escriu l'usuari cada cop
	 $opcio=$_POST["comanda_usuari"];
	 	//es divideix en strings la comanda del usuari. 
	 $comandoDividido = explode(" ", $opcio);
	 switch ($comandoDividido[0]) {
	 	case 'mkdir':
	 		
	 		if(sizeof($comandoDividido)==2){
	 			crear_directori($comandoDividido[1]);
	 			echo "directori creat<br>";
	 		}
	 		else{
	 				echo "comanda incorrecte. EXEMPLE: mkdir directori";
	 		}
	 		break;

	 	case 'rm':
	 	

	 		if(sizeof($comandoDividido)==3){

	 			if ($comandoDividido[1]=="-d") {
	 				esborra_directori($comandoDividido[2]);
	 				echo "directori borrat<br>";
	 			}elseif ($comandoDividido[1]=="-f") {
	 				esborra_fitxer($comandoDividido[2]);
	 			}else{
	 				echo " comando incorrecte. Escriu correctament -f o -d . EXEMPLE:rm -f FITXER.";
	 			}
	 			

	 		}
				
				else{
	 				echo " comando incorrecte. Escriu correctament -d o -f. EXEMPLE: rm -d directori";
	 			}
	 			

	 		
	 		

	 		
	 		break;

	 	case 'mv':
	 	
	 		if (sizeof($comandoDividido)==4) {
		 		if ($comandoDividido[1]=="-d") {
		 				moure_directori($comandoDividido[2], $comandoDividido[3]);
		 				echo "directori canviat correctament<br>";
		 			} elseif($comandoDividido[1]=="-f"){
						mou_fitxer($comandoDividido[2], $comandoDividido[3]);
					}
					else{
		 				echo " comando incorrecte. Escriu correctament -d o -f . EXEMPLE: mv -d DIRECTORI DESTI";
		 			}
		 			

		 		}
	 		else{
	 				echo " comanda incorrecte. EXEMPLE: mv -d o -f DIRECTORI DESTI";
	 		}


	 		
	 		break;

	 	case 'cp':
	 		echo "copiar directori:<br>";
	 		if (sizeof($comandoDividido)==4) {
	 		if ($comandoDividido[1]=="-d") {
	 				copiar_directori($comandoDividido[2], $comandoDividido[3]);
	 			}elseif($comandoDividido[1]=="-f") {
	 				copia_fitxer($comandoDividido[2], $comandoDividido[3]);
	 			}
				else{
	 				echo " comando incorrecte. Escriu correctament -d o -f . EXEMPLE:cp -d DIRECTORI DESTI.";
	 			}
	 			

	 		}
	 		else{
	 				echo " comanda incorrecte. EXEMPLE:cp -d o -f DIRECTORI DESTI.";
	 		}
	 	break;
	 	
	 	case 'ls':
	 	echo "llistar directoris:<br>"; 
	 		if(sizeof($comandoDividido)==2){
	 			llistat($comandoDividido[1]);

	 		}
	 		else{
	 				echo "comanda incorrecte. EXEMPLE: ls directori";
	 		}
	 	break;
		
		case 'find':
	 	
	 		if (sizeof($comandoDividido)==3) {
		 		find_fitxer($comandoDividido[1], $comandoDividido[2]);
					
		 	}
	 		else{
	 				echo " comanda incorrecte. EXEMPLE:find FITXER RUTA";
	 		}


	 		
	 		break;
			case 'stats':
	 	
	 		if (sizeof($comandoDividido)==2) {
		 		stats_fitxer($comandoDividido[1]);
					
		 	}
	 		else{
	 				echo " comanda incorrecte. EXEMPLE:stats FITXER";
	 		}


	 		
	 		break;
			
			case 'vim':
	 	
	 		if (sizeof($comandoDividido)==3) {
		 		crea_modifica_fitxer($comandoDividido[1], $comandoDividido[2]);
					
		 	}
	 		else{
	 				echo " comanda incorrecte. EXEMPLE:vim FITXER CONTINGUT";
	 		}

	 		
	 		break;
			case 'sha1':
	 	
	 		if (sizeof($comandoDividido)==2) {
		 		our_sha1($comandoDividido[1]);
					
		 	}
	 		else{
	 				echo " comanda incorrecte. EXEMPLE: sha1 FITXER";
	 		}


	 		
	 		break;
			
			case 'md5':
	 	
	 		if (sizeof($comandoDividido)==2) {
		 		our_md5($comandoDividido[1]);
					
		 	}
	 		else{
	 				echo " comanda incorrecte. EXEMPLE: md5 FITXER";
	 		}


	 		
	 		break;
			

	 	case 'pwd':
	 		ruta();
	 	break;

	 	case 'stats':
	 		stats_sistema();
	 		break;
			
	 	case 'help':
	 		echo "mkdir DIRECTORI...............crear directori<br>";
	 		echo "rm -d DIRECTORI...............esborrar directori<br>";
	 		echo "mv -d DIRECTORI DESTI.........moure directori<br>";
			echo "cp -d DIRECTORI DESTI.........copiar directori<br>";
			echo "find FITXER RUTA..............buscar fitxer<br>";
			echo "stats FITXER..................estadistíques fitxer<br>";
			echo "rm -f FITXER..................esborrar fitxers<br>";
			echo "mv -f FITXER DESTI............moure fitxer<br>";
			echo "cp -f FITXER DESTI............copiar fitxer<br>";
			echo "vim FITXER CONTINGUT..........crea o modifica fitxer<br>";
			echo "sha1 FITXER...................retorna el hash de sha1 d'un fitxer<br>";
			echo "md5 FITXER....................retorna el hash md5 d'un fitxer<br>";
			echo "ls............................mostra tots els directoris<br>";
			echo "pwd...........................retorna la ruta actual<br>";
			echo "stats.........................retorna la mida total del sistema i també l'espai lliure<br>";
	 		break;

	 	case 'HELP':
	 		echo "mkdir DIRECTORI...............crear directori<br>";
	 		echo "rm -d DIRECTORI...............esborrar directori<br>";
	 		echo "mv -d DIRECTORI DESTI.........moure directori<br>";
			echo "cp -d DIRECTORI DESTI.........copiar directori<br>";
			echo "find FITXER RUTA..............buscar fitxer<br>";
			echo "stats FITXER..................estadistíques fitxer<br>";
			echo "rm -f FITXER..................esborrar fitxers<br>";
			echo "mv -f FITXER DESTI............moure fitxer<br>";
			echo "cp -f FITXER DESTI............copiar fitxer<br>";
			echo "vim FITXER CONTINGUT..........crea o modifica fitxer<br>";
			echo "sha1 FITXER...................retorna el hash de sha1 d'un fitxer<br>";
			echo "md5 FITXER....................retorna el hash md5 d'un fitxer<br>";
			echo "ls............................mostra tots els directoris<br>";
			echo "pwd...........................retorna la ruta actual<br>";
			echo "stats.........................retorna la mida total del sistema i també l'espai lliure<br>";
	 		break;

	 	default:
	 		echo "Comanda incorrecte. Escriu HELP per veure les comandes";
	 		break;
	 }
	 //header("Location: ./consola.php");
 ?>