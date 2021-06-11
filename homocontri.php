<?php
  REQUIRE('conexion.php');
?>

<html>


    <head>
	  <link rel="stylesheet" type="text/css" href="estilos.css">
      
	  <title>SECRETARIA DE SALUD</title>
    </head>

   <body>
	<form name=consulta method=post action=homocontri.php>




<?php

        set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");



		$i=0;


 		$consulta="SELECT tipo_ide,numide,apellido1,apellido2,nombre1,nombre2,fe_nacimiento,departamento,municipio,estado,codeps from contributivo ORDER BY numide";
  		$resultado=mysql_query($consulta,$conectar);
   		$fil=mysql_num_rows($resultado);

	


	while($reg=mysql_fetch_array($resultado))
	     {

		$tipo[$i]=$reg['tipo_ide'];
		$ced[$i]=$reg['numide'];
		$ape1[$i]=$reg['apellido1'];
		$ape2[$i]=$reg['apellido2'];
		$nom1[$i]=$reg['nombre1'];
		$nom2[$i]=$reg['nombre2'];
		$fena[$i]=$reg['fe_nacimiento'];		
		$depar[$i]=$reg['departamento'];
		$muni[$i]=$reg['municipio'];
		$estad[$i]=$reg['estado'];
		$eps[$i]=$reg['codeps'];

		
		$i=$i+1;


             }
		
	



?>

<?php

	$j=0;
	$cont=0;

		while($j<$fil)
		     {

			$consul="select numide from contributivo where numide='$ced[$j]'";
			$resul=mysql_query($consul,$conectar);
   			$filas=mysql_num_rows($resul);
			
			if($filas>1)
			  {
				$tipod[]=$tipo[$j];
				$cedu[]=$ced[$j];
				$apel1[]=$ape1[$j];
				$apel2[]=$ape2[$j];
				$nomb1[]=$nom1[$j];
				$nomb2[]=$nom2[$j];
				$fenaci[]=$fena[$j];		
				$depart[]=$depar[$j];
				$munic[]=$muni[$j];
				$estado[]=$estad[$j];
				$eps2[]=$eps[$j];


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
		echo"<td>Lista de homónimos de régimen contributivo por documento (".$cont.")</td>";		    
		echo"</tr>";

	
	  echo"</table>";

	  echo"<br>";

	echo"<table width=100% class='inf'>";

	echo"<tr class='campos'>";


	echo"<td>TIPO ID</td><td>NUMERO ID</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>DEPARTAMENTO</td><td>MUNICIPIO</td><td>ESTADO</td><td>EPS</td>";

	echo"</tr>"; 



	while($a<$cont)
	     {
		$consult="SELECT tipo_ide,numide,apellido1,apellido2,nombre1,nombre2,fe_nacimiento,departamento,municipio,estado,codeps FROM contributivo where numide='$cedu[$a]' and apellido1='$apelli1[$a]' and apellido2='$apelli2[$a]' and nombre1='$nomb1[$a]' and nombre2='$nomb2[$a]' and tipo_ide='$tipod[$a]'";
  		$result=mysql_query($consult,$conectar);
		$regi=mysql_fetch_array($result);


   		
			echo"<tr class='info'>"; 
   			echo"<td>".$tipod[$a]."</td>";
   			echo"<td>".$cedu[$a]."</td>";
   			echo"<td>".$apel1[$a]."</td>";
   			echo"<td>".$apel2[$a]."</td>";
   			echo"<td>".$nomb1[$a]."</td>";
   			echo"<td>".$nomb2[$a]."</td>";
   			echo"<td>".$fenaci[$a]."</td>";
   			echo"<td>".$depart[$a]."</td>";
   			echo"<td>".$munic[$a]."</td>";
   			echo"<td>".$estado[$a]."</td>";
   			echo"<td>".$eps2[$a]."</td>";
	
			echo"</tr>";


	
			$a=$a+1;
			
		}		
		
			
        

        echo"</table>"; 

	echo"<br></br>";


  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exphocontri.php>Exportar datos a Excel</a></td>";
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

