<?php
  REQUIRE('conexion.php');
?>

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos3.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>
	<form name=consulta method=post action=homoregsub.php>

<?php

        set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");



		$i=0;


 		$consulta="SELECT conse,codeps,tipocabe,identicafabe,tipoideafi,ideafi,apellido1afi,apellido2afi,nombre1afi,nombre2afi,fenacimiento,sexo,tipoafi,parentesco,grupopobl,np,ficha,conben,coddpto,codmunicipio,area,afisistema,afiars,numcontrato,fecontrato,tipocontrato,grupoet,modsub,direccion,acuerdo,fechanove,estado,observacion FROM regsub ORDER BY ideafi";
  		$resultado=mysql_query($consulta,$conectar);
   		$fil=mysql_num_rows($resultado);

	


	while($reg=mysql_fetch_array($resultado))
	     {

		$cons[$i]=$reg['conse'];
   		$eps[$i]=$reg['codeps'];
   		$tipc[$i]=$reg['tipocabe'];
		$idc[$i]=$reg['identicafabe'];
		$tipo[$i]=$reg['tipoideafi'];

		$ced[$i]=$reg['ideafi'];
		$ape1[$i]=$reg['apellido1afi'];
		$ape2[$i]=$reg['apellido2afi'];
		$nom1[$i]=$reg['nombre1afi'];
		$nom2[$i]=$reg['nombre2afi'];

		$fena[$i]=$reg['fenacimiento'];
   		$sex[$i]=$reg['sexo'];
   		$tipa[$i]=$reg['tipoafi'];
   		$paren[$i]=$reg['parentesco'];
   		$grup[$i]=$reg['grupopobl'];
   		$np[$i]=$reg['np'];
   		$fich[$i]=$reg['ficha'];
   		$conb[$i]=$reg['conben'];
   		$depar[$i]=$reg['coddpto'];
   		$muni[$i]=$reg['codmunicipio'];
   		$are[$i]=$reg['area'];
   		$afi[$i]=$reg['afisistema'];
   		$afia[$i]=$reg['afiars'];
   		$numc[$i]=$reg['numcontrato'];
   		$fecon[$i]=$reg['fecontrato'];
   		$tipoc[$i]=$reg['tipocontrato'];
   		$grue[$i]=$reg['grupoet'];
   		$mods[$i]=$reg['modsub'];
   		$dire[$i]=$reg['direccion'];
   		$acuer[$i]=$reg['acuerdo'];
   		$fenov[$i]=$reg['fechanove'];
   		$estad[$i]=$reg['estado'];
   		$observ[$i]=$reg['observacion'];

	
		
		$i=$i+1;


             }
		
	



?>

<?php

	$j=0;
	$cont=0;

		while($j<$fil)
		     {

			$consul="select ideafi from regsub where ideafi='$ced[$j]'";
			$resul=mysql_query($consul,$conectar);
   			$filas=mysql_num_rows($resul);
			
			if($filas>1)
			  {
		
				$yearact=substr($today,0,4);	
				$yearnaci=substr($fena[$j],6,4);
				$tip=$tipo[$j];
		
				$edad=$yearact-$yearnaci;

				$conse[]=$cons[$j];
		   		$eps2[]=$eps[$j];
   				$tipca[]=$tipc[$j];
				$idca[]=$idc[$j];
				$tipod[]=$tipo[$j];
				$cedu[]=$ced[$j];
				$apel1[]=$ape1[$j];
				$apel2[]=$ape2[$j];
				$nomb1[]=$nom1[$j];
				$nomb2[]=$nom2[$j];

				$fenac[]=$fena[$j];
				$edadact[]=$edad;
   				$sexo[]=$sex[$j];
  		 		$tipaf[]=$tipa[$j];
   				$parent[]=$paren[$j];
   				$grupo[]=$grup[$j];
   				$np2[]=$np[$j];
   				$ficha[]=$fich[$j];
   				$conbe[]=$conb[$j];
		   		$depart[]=$depar[$j];
   				$munic[]=$muni[$j];
   				$area[]=$are[$j];
   				$afis[]=$afi[$j];
  		 		$afiar[]=$afia[$j];
  		 		$numco[]=$numc[$j];
  		 		$fecont[]=$fecon[$j];
  		 		$tipocon[]=$tipoc[$j];
  		 		$gruet[]=$grue[$j];
  		 		$modsub[]=$mods[$j];
  		 		$direc[]=$dire[$j];
				$edadac[]=$edad;
   		 		$acuerdo[]=$acuer[$j];
  		 		$fenove[]=$fenov[$j];
 		  		$estado[]=$estad[$j];
		   		$observa[]=$observ[$j];

			   $cont=$cont+1;	
			   
			  }
			   
			
      			$j=$j+1;
   
			
		     }	
	

?>

<?php

	$fechaact=date("d-m-Y");

	echo"<table width=100%  border=0 class='encab'>";
		
		echo"<tr>";

		echo"<td>Secretaria de Salud Caicedonia Valle</td>";

		echo"</tr>";

		echo"<tr>";
		echo"<td>Fecha: ".$fechaact."</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td>Lista de homónimos de régimen subsidiado por documento (".$cont.")</td>";		    
		echo"</tr>";

	
	  echo"</table>";

	  echo"<br>";


		
	$a=0;

	echo"<table class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>CONSE</td><td>EPS</td><td>TIPO DOC</td><td>ID. CABE</td><td>TIPO DOC</td><td>ID. AFILIADO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>SEXO</td><td>TIPOAFI</td><td>PARENT.</td><td>GRUPO</td><td>NIVEL SISBEN</td><td>FICHA</td><td>CONBEN</td><td>DEPART</td><td>MUNICI</td><td>AREA</td><td>AFISITEMA</td><td>AFIARS</td><td>NUMCONTRA</td><td>FECONTRA</td><td>TIPO CONTRA</td><td>GRUPO</td><td>MODSUB</td><td >DIRECCION</td><td>ACUERDO</td><td>FECHA NOVE</td><td>ESTADO</td><td>OBSERVACION</td></tr>";

	echo"</tr>";  


	while($a<$cont)
	     {

   		
			echo"<tr class='info'>"; 
   			echo"<td>".$conse[$a]."</td>";
   			echo"<td>".$eps2[$a]."</td>";
   			echo"<td>".$tipca[$a]."</td>";
   			echo"<td>".$idca[$a]."</td>";
   			echo"<td>".$tipod[$a]."</td>";
   			echo"<td>".$cedu[$a]."</td>";
   			echo"<td>".$apel1[$a]."</td>";
   			echo"<td>".$apel2[$a]."</td>";
   			echo"<td>".$nomb1[$a]."</td>";
   			echo"<td>".$nomb2[$a]."</td>";
   			echo"<td>".$fenac[$a]."</td>";
   			echo"<td>".$edadac[$a]."</td>";
   			echo"<td>".$sexo[$a]."</td>";
   			echo"<td>".$tipaf[$a]."</td>";
   			echo"<td>".$parent[$a]."</td>";
   			echo"<td>".$grupo[$a]."</td>";
   			echo"<td>".$np2[$a]."</td>";
   			echo"<td>".$ficha[$a]."</td>";
   			echo"<td>".$conbe[$a]."</td>";
   			echo"<td>".$depart[$a]."</td>";
   			echo"<td>".$munic[$a]."</td>";
   			echo"<td>".$area[$a]."</td>";
   			echo"<td>".$afis[$a]."</td>";
   			echo"<td>".$afiar[$a]."</td>";
   			echo"<td>".$numco[$a]."</td>";
   			echo"<td>".$fecont[$a]."</td>";
   			echo"<td>".$tipocon[$a]."</td>";
   			echo"<td>".$gruet[$a]."</td>";
   			echo"<td>".$modsub[$a]."</td>";
   			echo"<td>".$direc[$a]."</td>";
   			echo"<td>".$acuerdo[$a]."</td>";
   			echo"<td>".$fenove[$a]."</td>";
   			echo"<td>".$estado[$a]."</td>";
   			echo"<td>".$observa[$a]."</td>";
			echo"</tr>";

   		
 
			$a=$a+1;
			
		}		
		
	
        echo"</table>"; 

	echo"<br></br>";

  	echo"<table width=80% align=rigth border=0>";
	echo"<tr>";
	echo"<td><a href=exphoregsub.php>Exportar datos a Excel</a></td>";
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