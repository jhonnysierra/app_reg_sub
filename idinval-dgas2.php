<?php

  REQUIRE('conexion.php');

?>

<html>


    <head>
      
	  <link rel="stylesheet" type="text/css" href="estilos6.css">

	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>
	<form name=consulta method=post action=idinval-dgas2.php>

<?php

        set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");


    	$i=0;	
	
	$consulta="SELECT tipoide,numide,nombre1,nombre2,apellido1,apellido2,fenaci,departamento,municipio,codeps FROM idinvalidas ORDER BY nombre1,nombre2,apellido1,apellido2";
	$resultado=mysql_query($consulta,$conectar);
	$filas=mysql_num_rows($resultado);


	
	while($reg=mysql_fetch_array($resultado))
	     {


		$tipo[]=$reg['tipoide'];
		$ced[]=$reg['numide'];
		$nom1[]=$reg['nombre1'];
		$nom2[]=$reg['nombre2'];
		$ape1[]=$reg['apellido1'];
		$ape2[]=$reg['apellido2'];
		$fecha[]=$reg['fenaci'];
		$dpto[]=$reg['departamento'];
		$muni[]=$reg['municipio'];
		$eps[]=$reg['codeps'];
		
			
		$i=$i+1;

             }



?>


<?php

	$j=0;
	$cont=0;

		while($j<$filas)
		     {

			$consul="select numide from dgas where apellido1='$ape1[$j]' and apellido2='$ape2[$j]' and nombre1='$nom1[$j]'and nombre2='$nom2[$j]'";
			$resul=mysql_query($consul,$conectar);
   			$fil=mysql_num_rows($resul);


			if($fil>=1)
			  {
				$tipod[]=$tipo[$j];
				$cedu[]=$ced[$j];
				$nomb1[]=$nom1[$j];
				$nomb2[]=$nom2[$j];
				$apel1[]=$ape1[$j];
				$apel2[]=$ape2[$j];
				$fechan[]=$fecha[$j];
				$depto[]=$dpto[$j];
				$munic[]=$muni[$j];
				$eps2[]=$eps[$j];

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
		echo"<td>Lista de identidades invalidas que están en dgas por nombres (".$cont.")</td>";		    
		echo"</tr>";

	
	echo"</table>";

	echo"<br>";


	echo"<table width=100% class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>TIPO DOC.</td><td>NUMERO ID.</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>FE. NACIMIENTO</td><td>DEPARTAMENTO</td><td>MUNICIPIO</td><td>EPS</td></tr>";

	echo"</tr>";  


	while($a<$cont)
	     {

		echo"<tr class='info'>"; 
   		echo"<td>".$tipod[$a]."</td>";
   		echo"<td>".$cedu[$a]."</td>";
   		echo"<td>".$nomb1[$a]."</td>";
   		echo"<td>".$nomb2[$a]."</td>";
   		echo"<td>".$apel1[$a]."</td>";
   		echo"<td>".$apel2[$a]."</td>";
   		echo"<td>".$fechan[$a]."</td>";
   		echo"<td>".$depto[$a]."</td>";
   		echo"<td>".$munic[$a]."</td>";
   		echo"<td>".$eps2[$a]."</td>";


		$a=$a+1;

	     }

        echo"</table>"; 

	echo"<br></br>";

  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exidinval-dgas2.php>Exportar datos a Excel</a></td>";
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
