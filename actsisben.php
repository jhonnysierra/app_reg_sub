<?php
  REQUIRE('conexion.php');
?> 

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos10.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>

	<form name=consulta method=post action=actsisben.php>


<?php		


        set_time_limit(0);

		$consulta="select nuficha,cedula,apellido1,apellido2,nombre1,nombre2 from sisben";
  		$resultado=mysql_query($consulta,$conectar);
   		$fil=mysql_num_rows($resultado);


		$i=0;


		while($reg=mysql_fetch_array($resultado))
	     	{
			

			$nofi[$i]=$reg['nuficha'];
			$ficha[$i]=str_replace(' ','',$nofi[$i]);

			$ced[$i]=$reg['cedula'];
			$cedu[$i]=str_replace(' ','',$ced[$i]);
			
			$ape1[$i]=$reg['apellido1'];
			$apell1[$i]=str_replace(' ','',$ape1[$i]);
				
			$ape2[$i]=$reg['apellido2'];
			$apell2[$i]=str_replace(' ','',$ape2[$i]);
			
			$nom1[$i]=$reg['nombre1'];
			$nomb1[$i]=str_replace(' ','',$nom1[$i]);

			$nom2[$i]=$reg['nombre2'];
			$nomb2[$i]=str_replace(' ','',$nom2[$i]);
				


			$i=$i+1;

             	}


?>

<?php

		$j=0;

	   while($j<$fil)
		{	 
			
			$consult="update sisben set cedula='$cedu[$j]',apellido1='$apell1[$j]',apellido2='$apell2[$j]',nombre1='$nomb1[$j]',nombre2='$nomb2[$j]',nuficha='$ficha[$j]' where cedula='$ced[$j]' and apellido1='$ape1[$j]' and apellido2='$ape2[$j]' and nombre1='$nom1[$j]' and nombre2='$nom2[$j]' and nuficha='$nofi[$j]'";
			$result=mysql_query($consult,$conectar);

				
			$j=$j+1;
		}

		


?>


<?php		



		$consulta2="select cedula,apellido1,apellido2,nombre1,nombre2 from sisben";
  		$resultado2=mysql_query($consulta2,$conectar);
   		$fil2=mysql_num_rows($resultado2);


		$a=0;


		while($reg2=mysql_fetch_array($resultado2))
	     	{
			

			$cedula[$a]=$reg2['cedula'];

			
			$apel1[$a]=$reg2['apellido1'];
			$apelli1[$a]=str_replace('?','Ñ',$apel1[$a]);
				
			$apel2[$a]=$reg2['apellido2'];
			$apelli2[$a]=str_replace('?','Ñ',$apel2[$a]);
			
			$nombre1[$a]=$reg2['nombre1'];
			$nombr1[$a]=str_replace('?','Ñ',$nombre1[$a]);

			$nombre2[$a]=$reg2['nombre2'];
			$nombr2[$a]=str_replace('?','Ñ',$nombre2[$a]);
				


			$a=$a+1;

             	}


?>

<?php

		$b=0;

	   while($b<$fil2)
		{	 
			
			$consult2="update sisben set apellido1='$apelli1[$b]',apellido2='$apelli2[$b]',nombre1='$nombr1[$b]',nombre2='$nombr2[$b]' where cedula='$cedula[$b]' and apellido1='$apel1[$b]' and apellido2='$apel2[$b]' and nombre1='$nombre1[$b]' and nombre2='$nombre2[$b]'";
			$resul2=mysql_query($consult2,$conectar);

				
			$b=$b+1;
		}

		


?>


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