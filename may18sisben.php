<?php

  REQUIRE('conexion.php');

?>

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos5.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>
	<form name=consulta method=post action=may18sisben.php>


<?php



	set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");


	

		$consul="select nuficha,case(tipodoc)when '1' then 'CC' when '2' then 'TI' when '4' then 'RC' else tipodoc end tipo,cedula,apellido1,apellido2,nombre1,nombre2,fe_nacimiento,case(sexo)when '1' then 'M' when '2' then 'F' end sexo,fe_afilia,nivsisben,direccion from sisben ORDER BY apellido1,apellido2,nombre1,nombre2";
		$resul=mysql_query($consul,$conectar);
   		$filas=mysql_num_rows($resul);	

		$i=0;


		while($regis=mysql_fetch_array($resul))
		     {


			$ficha[]=$regis['nuficha'];
			$tipo[]=$regis['tipo'];
		   	$ced[]=$regis['cedula'];
		  	$apell1[]=$regis['apellido1'];	
			$apell2[]=$regis['apellido2'];
			$nom1[]=$regis['nombre1'];
			$nom2[]=$regis['nombre2'];
			$fecha[]=$regis['fe_nacimiento'];
			$sexo[]=$regis['sexo'];
			$afil[]=$regis['fe_afilia'];
			$nivel[]=$regis['nivsisben'];
			$dire[]=$regis['direccion'];
			
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

		if($edad>=18 && $tip<>"CC")
		   {

			

			$fich[]=$ficha[$j];
			$tipod[]=$tipo[$j];			
		   	$cedu[]=$ced[$j];
		  	$apelli1[]=$apell1[$j];	
			$apelli2[]=$apell2[$j];
			$nomb1[]=$nom1[$j];
			$nomb2[]=$nom2[$j];
			$fechan[]=$fecha[$j];
			$sexo2[]=$sexo[$j];
			$afili[]=$afil[$j];
			$nivels[]=$nivel[$j];
			$direc[]=$dire[$j];
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
		echo"<td>Lista de registros de sisben que necesitan actualizar documento a cedula (".$cont.")</td>";		    
		echo"</tr>";

	
	echo"</table>";

	echo"<br>";


	echo"<table class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>FICHA</td><td>TIPO DOC</td><td>NUMERO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>SEXO</td><td>AFI. AL SISTEMA</td><td>NIVEL</td><td>DIRECCION</td></tr>";

	echo"</tr>";  


	while($b<$cont)
	     {

		echo"<tr class='info'>"; 
   		echo"<td>".$fich[$b]."</td>";
   		echo"<td>".$tipod[$b]."</td>";
   		echo"<td>".$cedu[$b]."</td>";
   		echo"<td>".$apelli1[$b]."</td>";
   		echo"<td>".$apelli2[$b]."</td>";
   		echo"<td>".$nomb1[$b]."</td>";
   		echo"<td>".$nomb2[$b]."</td>";
   		echo"<td>".$fechan[$b]."</td>";
		echo"<td>".$edadac[$b]."</td>";
   		echo"<td>".$sexo2[$b]."</td>";
   		echo"<td>".$afili[$b]."</td>";
   		echo"<td>".$nivels[$b]."</td>";
   		echo"<td>".$direc[$b]."</td>";

		echo"</tr>";


		$b=$b+1;

	     }


        echo"</table>"; 

	echo"<br></br>";



  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exmay18sisben.php>Exportar datos a Excel</a></td>";
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