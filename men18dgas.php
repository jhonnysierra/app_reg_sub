<?php
  REQUIRE('conexion.php');
?>

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos2.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>
	<form name=consulta method=post action=men18dgas.php>


<?php

        set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");



		$i=0;


 		$consulta="SELECT tipo,consereg,departamento,municipio,codeps,periodoli,tipoide,numide,sexo,fe_nacimiento,apellido1,apellido2,nombre1,nombre2,zona,fe_afieps,dias,modalidad,numpago,cambioeps,epstraslado,valorupc,glosas FROM dgas ORDER BY apellido1,apellido2,nombre1,nombre2";
  		$resultado=mysql_query($consulta,$conectar);
   		$fil=mysql_num_rows($resultado);

	

		while($reg=mysql_fetch_array($resultado))
	     	     {

			$tipo[]=$reg['tipo'];
			$conse[]=$reg['consereg'];

			$tipoi[]=$reg['tipoide'];
   			$ced[]=$reg['numide'];
   			$apell1[]=$reg['apellido1'];
   			$apell2[]=$reg['apellido2'];
   			$nom1[]=$reg['nombre1'];
   			$nom2[]=$reg['nombre2'];

   			$fecha[]=$reg['fe_nacimiento'];
			$sex[]=$reg['sexo'];
   			$dpto[]=$reg['departamento'];
   			$muni[]=$reg['municipio'];
			$eps[]=$reg['codeps'];
  			$perli[]=$reg['periodoli'];
   			$zon[]=$reg['zona'];
   			$feafi[]=$reg['fe_afieps'];
   			$dia[]=$reg['dias'];
   			$mod[]=$reg['modalidad'];
   			$nupago[]=$reg['numpago'];
   			$ceps[]=$reg['cambioeps'];
   			$epst[]=$reg['epstraslado'];
   			$vupc[]=$reg['valorupc'];
   			$glosa[]=$reg['glosas'];
			
					
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
		$tip=$tipoi[$j];
		

		$edad=$yearact-$yearnaci;

		if($edad>6 && $edad<18 && $tip<>"TI")
		   {


			$tipoid[]=$tipoi[$j];
   			$cedu[]=$ced[$j];
   			$apelli1[]=$apell1[$j];	
			$apelli2[]=$apell2[$j];
			$nomb1[]=$nom1[$j];
			$nomb2[]=$nom2[$j];
			$fechan[]=$fecha[$j];
			$sexo[]=$sex[$j];
			$tipo2[]=$tipo[$j];
			$consec[]=$conse[$j];
   			$depto[]=$dpto[$j];
   			$munic[]=$muni[$j];
			$epss[]=$eps[$j];
  			$perliq[]=$perli[$j];
   			$zona[]=$zon[$j];
   			$feafie[]=$feafi[$j];
   			$dias[]=$dia[$j];
   			$moda[]=$mod[$j];
   			$numpago[]=$nupago[$j];
   			$caeps[]=$ceps[$j];
   			$epstr[]=$epst[$j];
   			$vaupc[]=$vupc[$j];
   			$glosas[]=$glosa[$j];
			$edadac[]=$edad;			

			
			

			$cont=$cont+1;

		   }							
		
		

		$j=$j+1;

	     }

	


?>

<?php

	$fechaact=date("d-m-Y");

	$b=0;

	echo"<table width=100%  border=0 class='encab'>";
		
		echo"<tr>";

		echo"<td>Secretaria de Salud Caicedonia Valle</td>";

		echo"</tr>";

		echo"<tr>";
		echo"<td>Fecha: ".$fechaact."</td>";
		echo"</tr>";


		echo"<tr>";
		echo"<td>Lista de registros de DGAS que necesitan actualizar documento a tarjeta de identidad (".$cont.")</td>";		    
		echo"</tr>";

	
	  echo"</table>";

	  echo"<br>";


	echo"<table  class='inf'>";

	echo"<tr class='campos'>";


	echo"<td>TIPO ID</td><td>NUMERO ID</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>F.NACIMIENTO</td><td>EDAD</td><td>SEXO</td><td>TIPO</td><td>CONSE</td><td>DEPARTAMENTO</td><td>MUNICIPIO</td><td>EPS</td><td>P. A LIQUIDAR</td><td>ZONA</td><td>F. AFILIACION</td><td>DIAS</td><td>MODALIDAD</td><td>N. DE PAGO</td><td>CAMBIO EPS</td><td>EPS TRASLADO</td><td>VALOR UPC</td><td>GLOSAS</td>";

	echo"</tr>";  


	while($b<$cont)
	     {

		echo"<tr class='info'>"; 
   		echo"<td>".$tipoid[$b]."</td>";
   		echo"<td>".$cedu[$b]."</td>";
   		echo"<td>".$apelli1[$b]."</td>";
   		echo"<td>".$apelli2[$b]."</td>";
   		echo"<td>".$nomb1[$b]."</td>";
   		echo"<td>".$nomb2[$b]."</td>";
   		echo"<td>".$fechan[$b]."</td>";
		echo"<td>".$edadac[$b]."</td>";
   		echo"<td>".$sexo[$b]."</td>";
   		echo"<td>".$tipo2[$b]."</td>";
   		echo"<td>".$consec[$b]."</td>";
   		echo"<td>".$depto[$b]."</td>";
		echo"<td>".$munic[$b]."</td>";
		echo"<td>".$epss[$b]."</td>";
		echo"<td>".$perliq[$b]."</td>";
		echo"<td>".$zona[$b]."</td>";
		echo"<td>".$feafie[$b]."</td>";
		echo"<td>".$dias[$b]."</td>";
		echo"<td>".$moda[$b]."</td>";
		echo"<td>".$numpago[$b]."</td>";
		echo"<td>".$caeps[$b]."</td>";
		echo"<td>".$epstr[$b]."</td>";
		echo"<td>".$vaupc[$b]."</td>";
		echo"<td>".$glosas[$b]."</td>";
		echo"</tr>";

		

		$b=$b+1;

	     }


        echo"</table>"; 

	echo"<br></br>";



  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exmen18dgas.php>Exportar datos a Excel</a></td>";
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