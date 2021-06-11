<?php
  REQUIRE('conexion.php');
?>

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos3.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>
	<form name=consulta method=post action=men18regsub.php>


<?php

        set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");



		$i=0;


 		$consulta="SELECT conse,codeps,tipocabe,identicafabe,tipoideafi,ideafi,apellido1afi,apellido2afi,nombre1afi,nombre2afi,fenacimiento,sexo,tipoafi,parentesco,grupopobl,np,ficha,conben,coddpto,codmunicipio,area,afisistema,afiars,numcontrato,fecontrato,tipocontrato,grupoet,modsub,direccion,acuerdo,fechanove,estado,observacion FROM regsub ORDER BY apellido1afi,apellido2afi,nombre1afi,nombre2afi";
  		$resultado=mysql_query($consulta,$conectar);
   		$fil=mysql_num_rows($resultado);

	


		while($regi=mysql_fetch_array($resultado))
	     	     {

			$conse[]=$regi['conse'];
   			$eps[]=$regi['codeps'];
   			$tc[]=$regi['tipocabe'];
   			$idc[]=$regi['identicafabe'];

   			$tipo[]=$regi['tipoideafi'];
   			$doc[]=$regi['ideafi'];
   			$apell1[]=$regi['apellido1afi'];
   			$apell2[]=$regi['apellido2afi'];
   			$nom1[]=$regi['nombre1afi'];
   			$nom2[]=$regi['nombre2afi'];

   			$fecha[]=$regi['fenacimiento'];
   			$sexo[]=$regi['sexo'];
   			$tipoafi[]=$regi['tipoafi'];
   			$parent[]=$regi['parentesco'];
   			$grupo[]=$regi['grupopobl'];
   			$np[]=$regi['np'];
   			$ficha[]=$regi['ficha'];
   			$conbe[]=$regi['conben'];
   			$dpto[]=$regi['coddpto'];
   			$muni[]=$regi['codmunicipio'];
   			$area[]=$regi['area'];
   			$afilsis[]=$regi['afisistema'];
   			$afiars[]=$regi['afiars'];
   			$numc[]=$regi['numcontrato'];
   			$fecon[]=$regi['fecontrato'];
   			$tipocon[]=$regi['tipocontrato'];
   			$getni[]=$regi['grupoet'];
   			$modsub[]=$regi['modsub'];
   			$dir[]=$regi['direccion'];
   			$acuer[]=$regi['acuerdo'];
   			$fechno[]=$regi['fechanove'];
   			$est[]=$regi['estado'];
   			$obse[]=$regi['observacion'];
		
		
			$i=$i+1;


     	            }
		

?>

<?php

	$j=0;
	$cont=0;

	while($j<$i)
	     {


	
		$yearact=substr($today,0,4);	
		$yearnaci=substr($fecha[$j],6,4);
		$tip=$tipo[$j];
		

		$edad=$yearact-$yearnaci;

		if($edad>6 && $edad<18 && $tip<>"TI")
		   {

			
			$consec[]=$conse[$j];
   			$epss[]=$eps[$j];
   			$tica[]=$tc[$j];
   			$idca[]=$idc[$j];
   			$tipod[]=$tipo[$j];
   			$docu[]=$doc[$j];
   			$apelli1[]=$apell1[$j];
   			$apelli2[]=$apell2[$j];
   			$nomb1[]=$nom1[$j];
   			$nomb2[]=$nom2[$j];
   			$fechan[]=$fecha[$j];
   			$sexo2[]=$sexo[$j];
   			$tipoafil[]=$tipoafi[$j];
   			$parente[]=$parent[$j];
   			$grupop[]=$grupo[$j];
   			$np2[]=$np[$j];
   			$ficha2[]=$ficha[$j];
   			$conben[]=$conbe[$j];
   			$depto[]=$dpto[$j];
   			$munic[]=$muni[$j];
   			$area2[]=$area[$j];
   			$afilsist[]=$afilsis[$j];
   			$afiars2[]=$afiars[$j];
   			$numco[]=$numc[$j];
   			$fecont[]=$fecon[$j];
   			$tipocont[]=$tipocon[$j];
   			$getnic[]=$getni[$j];
   			$modsubs[]=$modsub[$j];
   			$dire[]=$dir[$j];
   			$acuerdo[]=$acuer[$j];
   			$fechnov[]=$fechno[$j];
   			$esta[]=$est[$j];
   			$obser[]=$obse[$j];
			$edadac[]=$edad;
		


			$cont=$cont+1;

		   }							
		
		

		$j=$j+1;

	     }

	


?>

<?php

	$b=0;

	$fechaact=date("d-m-Y");

	echo"<table width=100%  border=0 class='encab'>";
		
		echo"<tr>";

		echo"<td>Secretaria de Salud Caicedonia Valle</td>";

		echo"</tr>";

		echo"<tr>";
		echo"<td>Fecha: ".$fechaact."</td>";
		echo"</tr>";

		echo"<tr>";
		echo"<td>Lista de registros de régimen subsidiado que necesitan actualizar documento a tarjeta de identidad (".$cont.")</td>";		    
		echo"</tr>";

	
	  echo"</table>";

	  echo"<br>";

	
	echo"<table class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>CONSE</td><td>EPS</td><td>TIPO DOC</td><td>ID. CABEFA</td><td>TIPO DOC</td><td>ID. AFILIADO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>SEXO</td><td>TIPOAFI</td><td>PARENTESCO</td><td>GRUPO</td><td>NIVEL SISBEN</td><td>FICHA</td><td>CONBEN</td><td>DEPART</td><td>MUNICI</td><td>AREA</td><td>AFISITEMA</td><td>AFIARS</td><td>NUMCONTRA</td><td>FECONTRA</td><td>TIPOCONTRA</td><td>GRUPO</td><td>MODSUB</td><td>DIRECCION</td><td>ACUERDO</td><td>FECHANOVE</td><td>ESTADO</td><td>OBSERVACION</td></tr>";

	echo"</tr>";  


	while($b<$cont)
	     {

		echo"<tr class='info'>"; 
   		echo"<td>".$consec[$b]."</td>";
   		echo"<td>".$epss[$b]."</td>";
   		echo"<td>".$tica[$b]."</td>";
   		echo"<td>".$idca[$b]."</td>";

   		echo"<td>".$tipod[$b]."</td>";
   		echo"<td>".$docu[$b]."</td>";
   		echo"<td>".$apelli1[$b]."</td>";
   		echo"<td>".$apelli2[$b]."</td>";
   		echo"<td>".$nomb1[$b]."</td>";
   		echo"<td>".$nomb2[$b]."</td>";

   		echo"<td>".$fechan[$b]."</td>";
   		echo"<td>".$edadac[$b]."</td>";
   		echo"<td>".$sexo2[$b]."</td>";
		echo"<td>".$tipoafil[$b]."</td>";
		echo"<td>".$parente[$b]."</td>";
		echo"<td>".$grupop[$b]."</td>";
		echo"<td>".$np2[$b]."</td>";
		echo"<td>".$ficha2[$b]."</td>";
		echo"<td>".$conben[$b]."</td>";
		echo"<td>".$depto[$b]."</td>";
		echo"<td>".$munic[$b]."</td>";
		echo"<td>".$area2[$b]."</td>";
		echo"<td>".$afilsist[$b]."</td>";
		echo"<td>".$afiars2[$b]."</td>";
		echo"<td>".$numco[$b]."</td>";
		echo"<td>".$fecont[$b]."</td>";
		echo"<td>".$tipocont[$b]."</td>";
		echo"<td>".$getnic[$b]."</td>";
		echo"<td>".$modsubs[$b]."</td>";
		echo"<td>".$dire[$b]."</td>";
		echo"<td>".$acuerdo[$b]."</td>";
		echo"<td>".$fechnov[$b]."</td>";
		echo"<td>".$esta[$b]."</td>";
		echo"<td>".$obser[$b]."</td>";
		echo"</tr>";


		$b=$b+1;

	     }


        echo"</table>"; 

	echo"<br></br>";



  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exmen18regsub.php>Exportar datos a Excel</a></td>";
	echo"</tr>";
	echo"</table>";


?>
<br><br><br>

 	<table width=50%  border=0>
		
		<tr>
		  <td><a href="menu.php"><img src="flecha-izquierda.jpg" alt="flecha-izquierda.jpg" width="70" height="50" border="0"></a></td>
	  </tr>
		<tr>

		<td><div align="left"><a href="menu.php">Ir al menu de inicio</a></div></td>
		</tr>
	</table>


      </form>
   </body>
</html>