<?php
  REQUIRE('conexion.php');
?>


<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos4.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>
	<form name=consulta method=post action=men18regsubval.php>



<?php

	set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");



	$consulta="SELECT conseafi,codeps,idecabefami,numidecabefami,tipoideafi,ideafi,apellido1,apellido2,nombre1,nombre2,fenacimiento,sexo,tipoafi,parentesco,grupopobla,nivelsisben,numficha,condicion,departamento,municipio,zona,feafiliacion,feeps,numcontra,iniciocontra,tipo,pertenencia,modalidad,estado FROM regsubvalido ORDER BY apellido1,apellido2,nombre1,nombre2";
  	$resultado=mysql_query($consulta,$conectar);
   	$filas=mysql_num_rows($resultado);	

	$i=0;

		while($reg=mysql_fetch_array($resultado))
		     {
			$conse[]=$reg['conseafi'];
			$eps[]=$reg['codeps'];
			$tcf[]=$reg['idecabefami'];
   			$icf[]=$reg['numidecabefami'];

			$tipia[]=$reg['tipoideafi'];
   			$ced[]=$reg['ideafi'];
   			$apell1[]=$reg['apellido1'];
   			$apell2[]=$reg['apellido2'];
   			$nom1[]=$reg['nombre1'];
   			$nom2[]=$reg['nombre2'];

   			$fecha[]=$reg['fenacimiento'];
			$sex[]=$reg['sexo'];
			$tipoafi[]=$reg['tipoafi'];
   			$parent[]=$reg['parentesco'];
   			$grupo[]=$reg['grupopobla'];
   			$nivsis[]=$reg['nivelsisben'];
			$fich[]=$reg['numficha'];
			$cond[]=$reg['condicion'];
   			$dpto[]=$reg['departamento'];
   			$muni[]=$reg['municipio'];
   			$zon[]=$reg['zona'];
   			$feafi[]=$reg['feafiliacion'];
   			$feep[]=$reg['feeps'];
   			$numc[]=$reg['numcontra'];
   			$inic[]=$reg['iniciocontra'];
   			$tipoc[]=$reg['tipo'];
   			$pert[]=$reg['pertenencia'];
   			$mod[]=$reg['modalidad'];
   			$est[]=$reg['estado'];
   			
					
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
		$tip=$tipia[$j];

		$edad=$yearact-$yearnaci;
		
		if($edad>6 && $edad<18 && $tip<>"TI")
		   {

			$consec[]=$conse[$j];
			$epss[]=$eps[$j];
			$tcfa[]=$tcf[$j];
   			$icfa[]=$icf[$j];

			$tipiaf[]=$tipia[$j];
   			$cedu[]=$ced[$j];
   			$apelli1[]=$apell1[$j];
   			$apelli2[]=$apell2[$j];
   			$nomb1[]=$nom1[$j];
   			$nomb2[]=$nom2[$j];

   			$fechan[]=$fecha[$j];
			$edadac[]=$edad;
			$sexo[]=$sex[$j];
			$tipoafil[]=$tipoafi[$j];
   			$parente[]=$parent[$j];
   			$grupop[]=$grupo[$j];
   			$nivsisb[]=$nivsis[$j];
			$ficha[]=$fich[$j];
			$condi[]=$cond[$j];
   			$depto[]=$dpto[$j];
   			$munic[]=$muni[$j];
   			$zona[]=$zon[$j];
   			$feafil[]=$feafi[$j];
   			$feeps[]=$feep[$j];
   			$numco[]=$numc[$j];
   			$inico[]=$inic[$j];
   			$tipoco[]=$tipoc[$j];
   			$perte[]=$pert[$j];
   			$moda[]=$mod[$j];
   			$esta[]=$est[$j];


			$cont=$cont+1;

		   }							
		
		$j=$j+1;

	     }

	



?>
	
<?php


 			
	$a=0;

	$fechaact=date("d-m-Y");

	echo"<table width=100%  border=0 class='encab'>";
		
		echo"<tr>";

		echo"<td>Secretaria de Salud Caicedonia Valle</td>";

		echo"</tr>";

		echo"<tr>";
		echo"<td>Fecha: ".$fechaact."</td>";
		echo"</tr>";

		echo"<tr>";
		echo"<td>Lista de registros de régimen subsidiado validado que necesitan actualizar documento a tarjeta de identidad (".$cont.")</td>";		    
		echo"</tr>";

	
	echo"</table>";

	echo"<br>";

	
	echo"<table class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>CONSECUTIVO</td><td>EPS</td><td>TIPO DOC</td><td>ID. CABEFA</td><td>TIPO DOC</td><td>ID. AFILIADO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>SEXO</td><td>TIPOAFI</td><td>PARENTESCO</td><td>GRUPO</td><td>NIVEL SISBEN</td><td>FICHA</td><td>CONDICION</td><td>DEPART</td><td>MUNICI</td><td>ZONA</td><td>FE. AFIL</td><td>FE. AFI. EPS</td><td>NUM. CONTRATO</td><td>INICIO CONTRATO</td><td>TIPO</td><td>PERTENENCIA</td><td>MODALIDAD</td><td>ESTADO</td>";

	echo"</tr>";  


	while($a<$cont)
	     {

		echo"<tr class='info'>"; 
   		echo"<td>".$consec[$a]."</td>";
   		echo"<td>".$epss[$a]."</td>";
   		echo"<td>".$tcfa[$a]."</td>";
   		echo"<td>".$icfa[$a]."</td>";
   		echo"<td>".$tipiaf[$a]."</td>";
   		echo"<td>".$cedu[$a]."</td>";
   		echo"<td>".$apelli1[$a]."</td>";
   		echo"<td>".$apelli2[$a]."</td>";
   		echo"<td>".$nomb1[$a]."</td>";
   		echo"<td>".$nomb2[$a]."</td>";
   		echo"<td>".$fechan[$a]."</td>";
		echo"<td>".$edadac[$a]."</td>";
   		echo"<td>".$sexo[$a]."</td>";
		echo"<td>".$tipoafil[$a]."</td>";
   		echo"<td>".$parente[$a]."</td>";
		echo"<td>".$grupop[$a]."</td>";
   		echo"<td>".$nivsisb[$a]."</td>";
		echo"<td>".$ficha[$a]."</td>";
		echo"<td>".$condi[$a]."</td>";
   		echo"<td>".$depto[$a]."</td>";
		echo"<td>".$munic[$a]."</td>";
   		echo"<td>".$zona[$a]."</td>";
		echo"<td>".$feafil[$a]."</td>";
   		echo"<td>".$feeps[$a]."</td>";
		echo"<td>".$numco[$a]."</td>";
   		echo"<td>".$inico[$a]."</td>";
		echo"<td>".$tipoco[$a]."</td>";
   		echo"<td>".$perte[$a]."</td>";
   		echo"<td>".$moda[$a]."</td>";
   		echo"<td>".$esta[$a]."</td>";
		echo"</tr>";

		$a=$a+1;

	     }


        echo"</table>"; 

	echo"<br></br>";



  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exmen18regsubval.php>Exportar datos a Excel</a></td>";
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