<?php
  REQUIRE('conexion.php');
?>

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos2.css">
      
	  <title>SECRETARIA DE SALUD</title>
    </head>

   <body>
	<form name=consulta method=post action=homodgas.php>
<?php

        set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");



		$i=0;


 		$consulta="SELECT tipo,consereg,departamento,municipio,codeps,periodoli,tipoide,numide,sexo,fe_nacimiento,apellido1,apellido2,nombre1,nombre2,zona,fe_afieps,dias,modalidad,numpago,cambioeps,epstraslado,valorupc,glosas FROM dgas ORDER BY numide";
  		$resultado=mysql_query($consulta,$conectar);
   		$fil=mysql_num_rows($resultado);

	


	while($reg=mysql_fetch_array($resultado))
	     {

		$tipo[$i]=$reg['tipo'];
		$conse[$i]=$reg['consereg'];
		$tipoi[$i]=$reg['tipoide'];
   		$ced[$i]=$reg['numide'];
   		$ape1[$i]=$reg['apellido1'];
   		$ape2[$i]=$reg['apellido2'];
   		$nom1[$i]=$reg['nombre1'];
   		$nom2[$i]=$reg['nombre2'];
   		$fecha[$i]=$reg['fe_nacimiento'];
		$sex[$i]=$reg['sexo'];
   		$dpto[$i]=$reg['departamento'];
   		$muni[$i]=$reg['municipio'];
		$eps[$i]=$reg['codeps'];
  		$perli[$i]=$reg['periodoli'];
   		$zon[$i]=$reg['zona'];
   		$feafi[$i]=$reg['fe_afieps'];
   		$dia[$i]=$reg['dias'];
   		$mod[$i]=$reg['modalidad'];
   		$nupago[$i]=$reg['numpago'];
   		$ceps[$i]=$reg['cambioeps'];
   		$epst[$i]=$reg['epstraslado'];
   		$vupc[$i]=$reg['valorupc'];
   		$glosa[$i]=$reg['glosas'];
		
		
		$i=$i+1;


             }
		
	



?>

<?php

	$j=0;
	$cont=0;

		while($j<$fil)
		     {

			$consul="select numide from dgas where numide='$ced[$j]'";
			$resul=mysql_query($consul,$conectar);
   			$filas=mysql_num_rows($resul);
			
			if($filas>1)
			  {

				$tipoid[]=$tipoi[$j];
   				$cedu[]=$ced[$j];
	   			$apel1[]=$ape1[$j];	
				$apel2[]=$ape2[$j];
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

			   $cont=$cont+1;	
			   
			  }
			   
			
      			$j=$j+1;
   
			
		     }	
	
?>

<?php

	$fechaact=date("d-m-Y");
		
	$a=0;

	echo"<table width=100%  border=0 class='encab'>";
		
		echo"<tr>";

		echo"<td>Secretaria de Salud Caicedonia Valle</td>";

		echo"</tr>";

		echo"<tr>";
		echo"<td>Fecha: ".$fechaact."</td>";
		echo"</tr>";

		echo"<tr>";
		echo"<td>Lista de homónimos de DGAS por documento (".$cont.")</td>";		    
		echo"</tr>";

	
	  echo"</table>";

	  echo"<br>";


	echo"<table  class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>TIPO ID</td><td>NUMERO ID</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>F. NACIMIENTO</td><td>SEXO</td><td>TIPO</td><td>CONSE</td><td>DEPARTAMENTO</td><td>MUNICIPIO</td><td>EPS</td><td>P. A LIQUIDAR</td><td>ZONA</td><td>F. AFILIACION</td><td>DIAS</td><td>MODALIDAD</td><td>N. DE PAGO</td><td>CAMBIO EPS</td><td>EPS TRASLADO</td><td>VALOR UPC</td><td>GLOSAS</td>";

	echo"</tr>"; 



	while($a<$cont)
	     {
	   		
			echo"<tr class='info'>"; 
   			echo"<td>".$tipoid[$a]."</td>";
   			echo"<td>".$cedu[$a]."</td>";
   			echo"<td>".$apel1[$a]."</td>";
   			echo"<td>".$apel2[$a]."</td>";
   			echo"<td>".$nomb1[$a]."</td>";
   			echo"<td>".$nomb2[$a]."</td>";
   			echo"<td>".$fechan[$a]."</td>";
   			echo"<td>".$sexo[$a]."</td>";
   			echo"<td>".$tipo2[$a]."</td>";
   			echo"<td>".$consec[$a]."</td>";
   			echo"<td>".$depto[$a]."</td>";
   			echo"<td>".$munic[$a]."</td>";
   			echo"<td>".$epss[$a]."</td>";
   			echo"<td>".$perliq[$a]."</td>";
   			echo"<td>".$zona[$a]."</td>";
   			echo"<td>".$feafie[$a]."</td>";
   			echo"<td>".$dias[$a]."</td>";
   			echo"<td>".$moda[$a]."</td>";
   			echo"<td>".$numpago[$a]."</td>";
   			echo"<td>".$caeps[$a]."</td>";
			echo"<td>".$epstr[$a]."</td>";
			echo"<td>".$vaupc[$a]."</td>";
			echo"<td>".$glosas[$a]."</td>";
	
			echo"</tr>";

   			
			$a=$a+1;
			
		}		
		
			
        

        echo"</table>"; 

	echo"<br></br>";


  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exphodgas.php>Exportar datos a Excel</a></td>";
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

