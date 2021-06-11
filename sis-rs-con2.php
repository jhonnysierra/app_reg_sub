<?php
  REQUIRE('conexion.php');
?>

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos5.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>
	<form name=consulta method=post action=sis-rs-con2.php>



<?php

	set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");


	

		$consul="select nuficha,case(tipodoc)when '1' then 'CC' when '2' then 'TI' when '4' then 'RC' else tipodoc end tipodoc,cedula,apellido1,apellido2,nombre1,nombre2,fe_nacimiento,case(sexo)when '1' then 'M' when '2' then 'F' end sexo,fe_afilia,nivsisben,direccion from sisben where (nivsisben='1' OR nivsisben='2') ORDER BY apellido1,apellido2,nombre1,nombre2";
		$resul=mysql_query($consul,$conectar);
   		$filas=mysql_num_rows($resul);	

		$i=0;


		while($regis=mysql_fetch_array($resul))
		     {


			$ficha[]=$regis['nuficha'];
			$tipo[]=$regis['tipodoc'];
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

		while($j<$filas)
		     {

 			$consulta="select tipoideafi,ideafi,apellido1afi,apellido2afi,nombre1afi,nombre2afi from regsub where apellido1afi='$apell1[$j]' and apellido2afi='$apell2[$j]' and nombre1afi='$nom1[$j]' and nombre2afi='$nom2[$j]' and (np='1' or np='2')";
  			$resultado=mysql_query($consulta,$conectar);
   			$fil=mysql_num_rows($resultado);

			if($fil==0)
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


				$cont=$cont+1;
								
			    }


			$j=$j+1;
   
			
		     }



?>

<?php




	$a=0;
	$cont2=0;

	while($a<$cont)
	     {

		$consult="select tipo_ide,numide,apellido1,apellido2,nombre1,nombre2 from contributivo where apellido1='$apelli1[$a]' and apellido2='$apelli2[$a]'and nombre1='$nomb1[$a]' and nombre2='$nomb2[$a]'";
		$resulta=mysql_query($consult,$conectar);
	   	$fila=mysql_num_rows($resulta);


		if($fila==0)
	 	  {
		
				$fichas[]=$fich[$a];
				$tipodoc[]=$tipod[$a];
		   		$cedul[]=$cedu[$a];
		  		$apellid1[]=$apelli1[$a];	
				$apellid2[]=$apelli2[$a];
				$nombr1[]=$nomb1[$a];
				$nombr2[]=$nomb2[$a];
				$fechana[]=$fechan[$a];
				$sexo3[]=$sexo2[$a];
				$afilia[]=$afili[$a];
				$nivelsi[]=$nivels[$a];
				$direcc[]=$direc[$a];


				$cont2=$cont2+1;
								
		  }


			$a=$a+1;
   
			
	     }


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
		echo"<td>Lista de priorizados por nombres (".$cont2.")</td>";		    
		echo"</tr>";

	
	echo"</table>";

	echo"<br>";


	echo"<table class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>FICHA</td><td>TIPO DOC</td><td>NUMERO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>SEXO</td><td>AFI. AL SISTEMA</td><td>NIVEL</td><td>DIRECCION</td></tr>";

	echo"</tr>";  


	while($b<$cont2)
	     {

		echo"<tr class='info'>"; 
   		echo"<td>".$fichas[$b]."</td>";
   		echo"<td>".$tipodoc[$b]."</td>";
   		echo"<td>".$cedul[$b]."</td>";
   		echo"<td>".$apellid1[$b]."</td>";
   		echo"<td>".$apellid2[$b]."</td>";
   		echo"<td>".$nombr1[$b]."</td>";
   		echo"<td>".$nombr2[$b]."</td>";
   		echo"<td>".$fechana[$b]."</td>";
   		echo"<td>".$sexo3[$b]."</td>";
   		echo"<td>".$afilia[$b]."</td>";
   		echo"<td>".$nivelsi[$b]."</td>";
   		echo"<td>".$direcc[$b]."</td>";
		echo"</tr>";

		$b=$b+1;

	     }


        echo"</table>"; 

	echo"<br></br>";



  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exsis-rs-con2.php>Exportar datos a Excel</a></td>";
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