<?php
  REQUIRE('conexion.php');
?> 

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos10.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>

	<form name=consulta method=post action=actinval.php>



<?php		


        set_time_limit(0);

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");


		$consulta="select numide,apellido1,apellido2,nombre1,nombre2 from idinvalidas";
  		$resultado=mysql_query($consulta,$conectar);
   		$fil=mysql_num_rows($resultado);


		$i=0;


		while($reg=mysql_fetch_array($resultado))
	     	{
			

			
			$ced[$i]=$reg['numide'];
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
			
			$consult="update idinvalidas set numide='$cedu[$j]',apellido1='$apell1[$j]',apellido2='$apell2[$j]',nombre1='$nomb1[$j]',nombre2='$nomb2[$j]' where numide='$ced[$j]' and apellido1='$ape1[$j]' and apellido2='$ape2[$j]' and nombre1='$nom1[$j]' and nombre2='$nom2[$j]'";
			$resul=mysql_query($consult,$conectar);
	
			$j=$j+1;
		}




?>

<?php

		$consulta2="select numide,apellido1,apellido2,nombre1,nombre2 from idinvalidas";
  		$resultado2=mysql_query($consulta2,$conectar);
   		$fil2=mysql_num_rows($resultado2);


		$a=0;


		while($reg2=mysql_fetch_array($resultado2))
	     	{
			
			
			$cedula[$a]=$reg2['numide'];

			
			$apel1[$a]=$reg2['apellido1'];
			$apelli1[$a]=str_replace('?','Ñ',$apel1[$a]);
				
			$apel2[$a]=$reg2['apellido2'];
			$apelli2[$a]=str_replace('?','Ñ',$apel2[$a]);
			
			$nombr1[$a]=$reg2['nombre1'];
			$nombre1[$a]=str_replace('?','Ñ',$nombr1[$a]);

			$nombr2[$a]=$reg2['nombre2'];
			$nombre2[$a]=str_replace('?','Ñ',$nombr2[$a]);


			$a=$a+1;
		
		

             	}
		

?>

<?php

	   $b=0;

	   while($b<$fil2)
		{	 
			
			$consult2="update idinvalidas set apellido1='$apelli1[$b]',apellido2='$apelli2[$b]',nombre1='$nombre1[$b]',nombre2='$nombre2[$b]' where numide='$cedula[$b]' and apellido1='$apel1[$b]' and apellido2='$apel2[$b]' and nombre1='$nombr1[$b]' and nombre2='$nombr2[$b]'";
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