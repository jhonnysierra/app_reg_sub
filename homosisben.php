<?php

  REQUIRE('conexion.php');

?>

<html>


    <head>
      
	  <link rel="stylesheet" type="text/css" href="estilos5.css">
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>
	<form name=consulta method=post action=homosisben.php>

<?php

        set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");


    	$i=0;	
	
	$consulta="SELECT nuficha,case(tipodoc)when '1' then 'CC' when '2' then 'TI' when '4' then 'RC' else tipodoc end tipo,cedula,apellido1,apellido2,nombre1,nombre2,fe_nacimiento,case(sexo)when '1' then 'M' when '2' then 'F' end sexo,fe_afilia,nivsisben,direccion FROM sisben ORDER BY cedula";
	$resultado=mysql_query($consulta,$conectar);
	$filas=mysql_num_rows($resultado);


	
	while($reg=mysql_fetch_array($resultado))
	     {


		$ficha[$i]=$reg['nuficha'];

		$tipo[$i]=$reg['tipo'];
		$ced[$i]=$reg['cedula'];
		$ape1[$i]=$reg['apellido1'];
		$ape2[$i]=$reg['apellido2'];
		$nom1[$i]=$reg['nombre1'];
		$nom2[$i]=$reg['nombre2'];

		$fecha[$i]=$reg['fe_nacimiento'];
		$sexo[$i]=$reg['sexo'];
		$afil[$i]=$reg['fe_afilia'];
		$nivel[$i]=$reg['nivsisben'];
		$dire[$i]=$reg['direccion'];
			
			
		$i=$i+1;

             }



?>


<?php

	$j=0;
	$cont=0;

		while($j<$filas)
		     {

			$consul="select cedula from sisben where cedula='$ced[$j]'";
			$resul=mysql_query($consul,$conectar);
   			$fil=mysql_num_rows($resul);


			if($fil>1)
			  {
				$fich[]=$ficha[$j];
				$tipod[]=$tipo[$j];			
			   	$cedu[]=$ced[$j];
		  		$apel1[]=$ape1[$j];	
				$apel2[]=$ape2[$j];
				$nomb1[]=$nom1[$j];
				$nomb2[]=$nom2[$j];
				$fechan[]=$fecha[$j];
				$sexo2[]=$sexo[$j];
				$afili[]=$afil[$j];
				$nivels[]=$nivel[$j];
				$direc[]=$dire[$j];
				

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
		echo"<td>Lista de homónimos de sisben por documento (".$cont.")</td>";		    
		echo"</tr>";

	
	echo"</table>";

	echo"<br>";


	echo"<table class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>FICHA</td><td>TIPO DOC.</td><td>NUMERO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>SEXO</td><td>AFI. AL SISTEMA</td><td>NIVEL</td><td>DIRECCION</td></tr>";

	echo"</tr>";  


	while($a<$cont)
	     {

		echo"<tr class='info'>"; 
   		echo"<td>".$fich[$a]."</td>";
   		echo"<td>".$tipod[$a]."</td>";
   		echo"<td>".$cedu[$a]."</td>";
   		echo"<td>".$apel1[$a]."</td>";
   		echo"<td>".$apel2[$a]."</td>";
   		echo"<td>".$nomb1[$a]."</td>";
   		echo"<td>".$nomb2[$a]."</td>";
   		echo"<td>".$fechan[$a]."</td>";
   		echo"<td>".$sexo2[$a]."</td>";
   		echo"<td>".$afili[$a]."</td>";
   		echo"<td>".$nivels[$a]."</td>";
   		echo"<td>".$direc[$a]."</td>";

		echo"</tr>";

		$a=$a+1;

	     }

        echo"</table>"; 

	echo"<br></br>";

  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exphosisben.php>Exportar datos a Excel</a></td>";
	echo"</tr>";
	echo"</table>"; 


	echo"<br></br>";

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