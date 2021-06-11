<?php
  REQUIRE('conexion.php');
?>


<html>


    <head>
	  <link rel="stylesheet" type="text/css" href="estilos.css">
      
	  <title>SECRETARIA DE SALUD</title>
    </head>

   <body>
	<form name=consulta method=post action=men18contri.php>



<?php

	set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");



	$consulta="SELECT tipo_ide,numide,apellido1,apellido2,nombre1,nombre2,fe_nacimiento,departamento,municipio,estado,codeps FROM contributivo ORDER BY apellido1,apellido2,nombre1,nombre2";
  	$resultado=mysql_query($consulta,$conectar);
   	$filas=mysql_num_rows($resultado);	

	$i=0;

		while($reg=mysql_fetch_array($resultado))
		     {
			$tipo[]=$reg['tipo_ide'];
   			$ced[]=$reg['numide'];
   			$apell1[]=$reg['apellido1'];
   			$apell2[]=$reg['apellido2'];
   			$nom1[]=$reg['nombre1'];
   			$nom2[]=$reg['nombre2'];
   			$fecha[]=$reg['fe_nacimiento'];
   			$dpto[]=$reg['departamento'];
   			$muni[]=$reg['municipio'];
   			$est[]=$reg['estado'];
   			$eps[]=$reg['codeps'];
					
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

			$tipod[]=$tipo[$j];			
		   	$cedu[]=$ced[$j];
		  	$apelli1[]=$apell1[$j];	
			$apelli2[]=$apell2[$j];
			$nomb1[]=$nom1[$j];
			$nomb2[]=$nom2[$j];
			$fechan[]=$fecha[$j];
   			$depto[]=$dpto[$j];
   			$munic[]=$muni[$j];
   			$esta[]=$est[$j];
   			$epss[]=$eps[$j];
			$edadac[]=$edad;


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
		echo"<td>Lista de registros de régimen contributivo que necesitan actualizar documento a tarjeta de identidad (".$cont.")</td>";		    
		echo"</tr>";

	
	  echo"</table>";

	  echo"<br>";
	

	echo"<table width=100%  border=0 class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>TIPO ID</td><td>NUMERO ID</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>DEPARTAMENTO</td><td>MUNICIPIO</td><td>ESTADO</td><td>EPS</td>";

	echo"</tr>";  


	while($a<$cont)
	     {

		echo"<tr class='info'>"; 
   		echo"<td>".$tipod[$a]."</td>";
   		echo"<td>".$cedu[$a]."</td>";
   		echo"<td>".$apelli1[$a]."</td>";
   		echo"<td>".$apelli2[$a]."</td>";
   		echo"<td>".$nomb1[$a]."</td>";
   		echo"<td>".$nomb2[$a]."</td>";
   		echo"<td>".$fechan[$a]."</td>";
		echo"<td>".$edadac[$a]."</td>";
   		echo"<td>".$depto[$a]."</td>";
   		echo"<td>".$munic[$a]."</td>";
   		echo"<td>".$esta[$a]."</td>";
   		echo"<td>".$epss[$a]."</td>";
		echo"</tr>";



		$a=$a+1;

	     }


        echo"</table>"; 

	echo"<br></br>";



  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exmen18contri.php>Exportar datos a Excel</a></td>";
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