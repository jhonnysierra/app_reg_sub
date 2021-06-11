<?php
  REQUIRE('conexion.php');
?> 

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos10.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>

	<form name=consulta method=post action=actregsub.php>


<?php		


        set_time_limit(0);

		$consulta="select ideafi,apellido1afi,apellido2afi,nombre1afi,nombre2afi,ficha from regsub";
  		$resultado=mysql_query($consulta,$conectar);
   		$fil=mysql_num_rows($resultado);


		$i=0;


		while($reg=mysql_fetch_array($resultado))
	     	{
			

			$nofi[$i]=$reg['ficha'];
			$ficha[$i]=str_replace(' ','',$nofi[$i]);
			
			$ced[$i]=$reg['ideafi'];
			$cedu[$i]=str_replace(' ','',$ced[$i]);
			
			$ape1[$i]=$reg['apellido1afi'];
			$apell1[$i]=str_replace(' ','',$ape1[$i]);
				
			$ape2[$i]=$reg['apellido2afi'];
			$apell2[$i]=str_replace(' ','',$ape2[$i]);
			
			$nom1[$i]=$reg['nombre1afi'];
			$nomb1[$i]=str_replace(' ','',$nom1[$i]);

			$nom2[$i]=$reg['nombre2afi'];
			$nomb2[$i]=str_replace(' ','',$nom2[$i]);


			$i=$i+1;

             	}
		

?>

<?php

		$j=0;

	   while($j<$fil)
		{	 
			
			$consult="update regsub set ideafi='$cedu[$j]',apellido1afi='$apell1[$j]',apellido2afi='$apell2[$j]',nombre1afi='$nomb1[$j]',nombre2afi='$nomb2[$j]',ficha='$ficha[$j]' where apellido1afi='$ape1[$j]' and apellido2afi='$ape2[$j]' and nombre1afi='$nom1[$j]' and nombre2afi='$nom2[$j]' and ideafi='$ced[$j]' and ficha='$nofi[$j]'";
			$resul=mysql_query($consult,$conectar);
			
	
			$j=$j+1;
		}




?>


<?php		



		$consulta2="select ideafi,apellido1afi,apellido2afi,nombre1afi,nombre2afi,ficha from regsub";
  		$resultado2=mysql_query($consulta2,$conectar);
   		$fil2=mysql_num_rows($resultado2);


		$a=0;


		while($reg2=mysql_fetch_array($resultado2))
	     	{
			

			$cedula[$a]=$reg2['ideafi'];

			
			$apel1[$a]=$reg2['apellido1afi'];
			$apelli1[$a]=str_replace('?','Ñ',$apel1[$a]);
				
			$apel2[$a]=$reg2['apellido2afi'];
			$apelli2[$a]=str_replace('?','Ñ',$apel2[$a]);
			
			$nombre1[$a]=$reg2['nombre1afi'];
			$nombr1[$a]=str_replace('?','Ñ',$nombre1[$a]);

			$nombre2[$a]=$reg2['nombre2afi'];
			$nombr2[$a]=str_replace('?','Ñ',$nombre2[$a]);
				


			$a=$a+1;

             	}


?>

<?php

		$b=0;

	   while($b<$fil2)
		{	 
			
			$consult2="update regsub set apellido1afi='$apelli1[$b]',apellido2afi='$apelli2[$b]',nombre1afi='$nombr1[$b]',nombre2afi='$nombr2[$b]' where apellido1afi='$apel1[$b]' and apellido2afi='$apel2[$b]' and nombre1afi='$nombre1[$b]' and nombre2afi='$nombre2[$b]' and ideafi='$cedula[$b]'";
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