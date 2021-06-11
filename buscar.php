<?php
  REQUIRE('conexion.php');

?>

<html>


    <head>

	  <link rel="stylesheet" type="text/css" href="estilos8.css">
      
	  <title>SECRETARIA DE SALUD</title>

    </head>

   <body>

	<form name=consulta method=post action=buscar.php>

	<?php $fechaact=date("d-m-Y");

	echo"<table width=100%  border=0 class='encab'>";
		
		echo"<tr>";

		echo"<td>Secretaria de Salud Caicedonia Valle</td>";

		echo"</tr>";

		echo"<tr>";
		echo"<td>Fecha: ".$fechaact."</td>";
		echo"</tr>";
		

		echo"</table>";
	
		echo"<br>";

 		?>


	<table width=30% border=0 align=center class='bus'>

	<tr>
	  <td>Buscar por:</td>
	</tr>

	<tr>
   	 <td><input type=radio name=Rbuscar value="ced" checked>Documento</td>
   	 <td><input type=radio name=Rbuscar value="nom">Nombres</td>
	</tr>

	</table>
	<br><br>	


	<table width=30% border=0 align=center class='bus'>


	<tr>
	  <td>Numero</td>
	  <td><input type=text name=Tced size=30 value="" class="datos"></td>
	</tr>

	<tr>	    
	  <td>Apellido 1</td>		    
          <td><input type=text name=Tape1 size=30 value="" onBlur="this.value = this.value.toUpperCase();" class="datos"></td>
	</tr>

	<tr>	    
	  <td>Apellido 2</td>		    
          <td><input type=text name=Tape2 size=30 value="" onBlur="this.value = this.value.toUpperCase();" class="datos"></td>
	</tr>

	<tr>	    
	  <td>Nombre 1</td>		    
          <td><input type=text name=Tnom1 size=30 value="" onBlur="this.value = this.value.toUpperCase();" class="datos"></td>
	</tr>

	<tr>	    
	  <td>Nombre 2</td>		    
          <td><input type=text name=Tnom2 size=30 value="" onBlur="this.value = this.value.toUpperCase();" class="datos"></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>

	

	<tr>
	  <td><input type="submit" name=Bbus value="Buscar" class="buscar"></td>
	  <td><input type="submit" name="Blimpiar" value="Limpiar" class="buscar"></td>
	</tr>	
	</table>
	


<?php

	set_time_limit(0);
  

	$today = date("Y-m-d");
        $r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");

 
   if($_REQUEST['Bbus']=="Buscar")
     {

	$ced=$_REQUEST['Tced'];
	$ape1=$_REQUEST['Tape1'];
	$ape2=$_REQUEST['Tape2'];
	$nom1=$_REQUEST['Tnom1'];
	$nom2=$_REQUEST['Tnom2'];
	$rbus=$_REQUEST['Rbuscar'];
		

	if($rbus=="ced")
	  {		

	    $consulta="SELECT nuficha,direccion,barrio,apellido1,apellido2,nombre1,nombre2,case(tipodoc)when '1' then 'CC' when '2' then 'TI' when '4' then 'RC' else tipodoc end tipo,cedula,fe_nacimiento,case(sexo)when '1' then 'M' when '2' then 'F' end sexo,nivsisben FROM sisben where cedula like'$ced'";

	    $consulta2="SELECT conse,codeps,tipocabe,identicafabe,tipoideafi,ideafi,apellido1afi,apellido2afi,nombre1afi,nombre2afi,fenacimiento,sexo,tipoafi,parentesco,grupopobl,np,ficha,coddpto,codmunicipio,area,afisistema,afiars,numcontrato,fecontrato,tipocontrato,grupoet,modsub,direccion,acuerdo,fechanove,estado,observacion FROM regsub where ideafi like'$ced'";	

	    $consulta3="SELECT conseafi,codeps,idecabefami,numidecabefami,tipoideafi,ideafi,apellido1,apellido2,nombre1,nombre2,fenacimiento,sexo,tipoafi,parentesco,grupopobla,nivelsisben,numficha,condicion,departamento,municipio,zona,feafiliacion,feeps,numcontra,iniciocontra,tipo,pertenencia,modalidad,estado FROM regsubvalido where ideafi like'$ced'";	

	    $consulta4="SELECT tipo,consereg,departamento,municipio,codeps,periodoli,tipoide,numide,sexo,fe_nacimiento,apellido1,apellido2,nombre1,nombre2,zona,fe_afieps,dias,modalidad,numpago,cambioeps,epstraslado,valorupc,glosas FROM dgas where numide like'$ced'";

	    $consulta5="SELECT tipo_ide,numide,apellido1,apellido2,nombre1,nombre2,fe_nacimiento,departamento,municipio,estado,codeps FROM contributivo where numide like'$ced'";	

	    $consulta6="SELECT tipoide,numide,nombre1,nombre2,apellido1,apellido2,fenaci,departamento,municipio,codeps FROM idinvalidas where numide like'$ced'";
	
	   }

	if($rbus=="nom")
	  {		

	    $consulta="SELECT nuficha,barrio,direccion,apellido1,apellido2,nombre1,nombre2,case(tipodoc)when '1' then 'CC' when '2' then 'TI' when '4' then 'RC' else tipodoc end tipo,cedula,fe_nacimiento,case(sexo)when '1' then 'M' when '2' then 'F' end sexo,edad,nivsisben FROM sisben where apellido1 like'$ape1' and apellido2 like'$ape2' and nombre1 like'$nom1' and nombre2 like'$nom2'";

	    $consulta2="SELECT conse,codeps,tipocabe,identicafabe,tipoideafi,ideafi,apellido1afi,apellido2afi,nombre1afi,nombre2afi,fenacimiento,sexo,tipoafi,parentesco,grupopobl,np,ficha,coddpto,codmunicipio,area,afisistema,afiars,numcontrato,fecontrato,tipocontrato,grupoet,modsub,direccion,acuerdo,fechanove,estado,observacion FROM regsub where apellido1afi like'$ape1' and apellido2afi like'$ape2' and nombre1afi like'$nom1' and nombre2afi like'$nom2'";
	
	    $consulta3="SELECT conseafi,codeps,idecabefami,numidecabefami,tipoideafi,ideafi,apellido1,apellido2,nombre1,nombre2,fenacimiento,sexo,tipoafi,parentesco,grupopobla,nivelsisben,numficha,condicion,departamento,municipio,zona,feafiliacion,feeps,numcontra,iniciocontra,tipo,pertenencia,modalidad,estado FROM regsubvalido where apellido1 like'$ape1' and apellido2 like'$ape2' and nombre1 like'$nom1' and nombre2 like'$nom2'";	

	    $consulta4="SELECT tipo,consereg,departamento,municipio,codeps,periodoli,tipoide,numide,sexo,fe_nacimiento,apellido1,apellido2,nombre1,nombre2,zona,fe_afieps,dias,modalidad,numpago,cambioeps,epstraslado,valorupc,glosas FROM dgas where apellido1 like'$ape1' and apellido2 like'$ape2' and nombre1 like'$nom1' and nombre2 like'$nom2'";

	    $consulta5="SELECT tipo_ide,numide,apellido1,apellido2,nombre1,nombre2,fe_nacimiento,departamento,municipio,estado,codeps FROM contributivo where apellido1 like'$ape1' and apellido2 like'$ape2' and nombre1 like'$nom1' and nombre2 like'$nom2'";	

	    $consulta6="SELECT tipoide,numide,nombre1,nombre2,apellido1,apellido2,fenaci,departamento,municipio,codeps FROM idinvalidas where nombre1 like'$nom1' and nombre2 like'$nom2' and apellido1 like'$ape1' and apellido2 like'$ape2'" ;
	
	   }


	    $resultado=mysql_query($consulta,$conectar);
	    $filas=mysql_num_rows($resultado);				

	    $resultado2=mysql_query($consulta2,$conectar);
	    $filas2=mysql_num_rows($resultado2);				


	    $resultado3=mysql_query($consulta3,$conectar);
	    $filas3=mysql_num_rows($resultado3);


	    $resultado4=mysql_query($consulta4,$conectar);
	    $filas4=mysql_num_rows($resultado4);

	    $resultado5=mysql_query($consulta5,$conectar);
	    $filas5=mysql_num_rows($resultado5);

	    $resultado6=mysql_query($consulta6,$conectar);
	    $filas6=mysql_num_rows($resultado6);
		  

	echo"<br>";
	
	echo"<table width=80% align=rigth border=0 class='encab2'>";
	
	echo"<tr>";
	echo"<td>".$filas." registro(s) encontrado(s) en sisben</td>";
	echo"</tr>";

	echo"</table>";


	echo"<table width=100% class='inf'>";

	echo"<tr class='campos'>";


	echo"<td>TIPO DOC</td><td>NUMERO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>SEXO</td><td>EDAD</td><td>DIRECCION</td><td>BARRIO</td><td>FICHA</td><td>NIVEL SISBEN</td>";

	echo"</tr>"; 
	
	while($regi=mysql_fetch_array($resultado))
	     {
		$fec=$regi['fe_nacimiento'];
		$yearact=substr($today,0,4);	
		$yearnaci=substr($fec,6,4);

		$edad=$yearact-$yearnaci;


			echo"<tr class='info'>"; 
   			echo"<td>".$regi['tipo']."</td>";
   			echo"<td>".$regi['cedula']."</td>";
   			echo"<td>".$regi['apellido1']."</td>";
   			echo"<td>".$regi['apellido2']."</td>";
   			echo"<td>".$regi['nombre1']."</td>";
   			echo"<td>".$regi['nombre2']."</td>";
   			echo"<td>".$regi['fe_nacimiento']."</td>";
   			echo"<td>".$regi['sexo']."</td>";
			echo"<td>".$edad."</td>";
			echo"<td>".$regi['direccion']."</td>"; 
			echo"<td>".$regi['barrio']."</td>";  			
   			echo"<td>".$regi['nuficha']."</td>";
   			echo"<td>".$regi['nivsisben']."</td>";
			echo"</tr>";


	     }	


		echo"</table>";
	

    
	




	echo"<br><br>";
	
	echo"<table width=80% align=rigth border=0 class='encab2'>";
	
	echo"<tr>";
	echo"<td>".$filas2." registro(s) encontrado(s) en regimen subsidiado</td>";
	echo"</tr>";

	echo"</table>";


	echo"<table class='inf'>";

	echo"<tr class='campos'>";


	echo"<td>CONSECUTIVO</td><td>EPS</td><td>TIPO DOC</td><td>ID. CABEFA</td><td>TIPO DOC</td><td>ID. AFILIADO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>SEXO</td><td>NIVEL SISBEN</td><td>FICHA</td><td>TIPOAFI</td><td>PARENTESCO</td><td>GRUPO POBLA</td><td>DEPART</td><td>MUNICI</td><td>AREA</td><td>AFISITEMA</td><td>AFIARS</td><td>NUMCONTRA</td><td>FECONTRA</td><td>TIPOCONTRA</td><td>GRUPO ETNI</td><td>MODSUB</td><td>DIRECCION</td><td>ACUERDO</td><td>FECHANOVE</td><td>ESTADO</td><td>OBSERVACION</td></tr>";

	echo"</tr>";

	while($regi2=mysql_fetch_array($resultado2))
	     {

		$fec2=$regi2['fenacimiento'];
		$yearact2=substr($today,0,4);	
		$yearnaci2=substr($fec2,6,4);

		$edad2=$yearact2-$yearnaci2; 

			echo"<tr class='info'>"; 
   			echo"<td>".$regi2['conse']."</td>";
   			echo"<td>".$regi2['codeps']."</td>";
   			echo"<td>".$regi2['tipocabe']."</td>";
   			echo"<td>".$regi2['identicafabe']."</td>";
   			echo"<td>".$regi2['tipoideafi']."</td>";
   			echo"<td>".$regi2['ideafi']."</td>";
   			echo"<td>".$regi2['apellido1afi']."</td>";
   			echo"<td>".$regi2['apellido2afi']."</td>";
   			echo"<td>".$regi2['nombre1afi']."</td>";
			echo"<td>".$regi2['nombre2afi']."</td>"; 
			echo"<td>".$regi2['fenacimiento']."</td>";  			
			echo"<td>".$edad2."</td>";
   			echo"<td>".$regi2['sexo']."</td>";
   			echo"<td>".$regi2['np']."</td>";
   			echo"<td>".$regi2['ficha']."</td>";
   			echo"<td>".$regi2['tipoafi']."</td>";
			echo"<td>".$regi2['parentesco']."</td>"; 
			echo"<td>".$regi2['grupopobl']."</td>"; 
			echo"<td>".$regi2['coddpto']."</td>"; 
			echo"<td>".$regi2['codmunicipio']."</td>";  			
   			echo"<td>".$regi2['area']."</td>";
   			echo"<td>".$regi2['afisistema']."</td>";
			echo"<td>".$regi2['afiars']."</td>"; 
			echo"<td>".$regi2['numcontrato']."</td>";  			
   			echo"<td>".$regi2['fecontrato']."</td>";
   			echo"<td>".$regi2['tipocontrato']."</td>";
			echo"<td>".$regi2['grupoet']."</td>"; 
			echo"<td>".$regi2['modsub']."</td>";  			
			echo"<td>".$regi2['direccion']."</td>";
   			echo"<td>".$regi2['acuerdo']."</td>";
   			echo"<td>".$regi2['fechanove']."</td>";
   			echo"<td>".$regi2['estado']."</td>";
   			echo"<td>".$regi2['observacion']."</td>";
			echo"</tr>";




			echo"</tr>";


	     }	


	echo"</table>";




	echo"<br><br>";
	
	echo"<table width=80% align=rigth border=0 class='encab2'>";
	
	echo"<tr>";
	echo"<td>".$filas3." registro(s) encontrado(s) en regimen subsidiado validado</td>";
	echo"</tr>";

	echo"</table>";


	echo"<table class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>CONSECUTIVO</td><td>EPS</td><td>TIPO DOC</td><td>ID. CABEFA</td><td>TIPO DOC</td><td>ID. AFILIADO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>SEXO</td><td>TIPO AFILI</td><td>PARENTESCO</td><td>GRUPO</td><td>NIVEL SISBEN</td><td>FICHA</td><td>CONDICION</td><td>DEPART</td><td>MUNICI</td><td>ZONA</td><td>FE. AFIL</td><td>FE. AFI. EPS</td><td>NUM. CONTRATO</td><td>INICIO CONTRATO</td><td>TIPO</td><td>PERTENENCIA</td><td>MODALIDAD</td><td>ESTADO</td>";

	echo"</tr>";

	while($regi3=mysql_fetch_array($resultado3))
	     {
		$fec3=$regi3['fenacimiento'];
		$yearact3=substr($today,0,4);	
		$yearnaci3=substr($fec3,6,4);

		$edad3=$yearact3-$yearnaci3;


			echo"<tr class='info'>"; 
   			echo"<td>".$regi3['conseafi']."</td>";
   			echo"<td>".$regi3['codeps']."</td>";
   			echo"<td>".$regi3['idecabefami']."</td>";
   			echo"<td>".$regi3['numidecabefami']."</td>";
   			echo"<td>".$regi3['tipoideafi']."</td>";
   			echo"<td>".$regi3['ideafi']."</td>";
   			echo"<td>".$regi3['apellido1']."</td>";
   			echo"<td>".$regi3['apellido2']."</td>";
			echo"<td>".$regi3['nombre1']."</td>"; 
			echo"<td>".$regi3['nombre2']."</td>";  			
   			echo"<td>".$regi3['fenacimiento']."</td>";
   			echo"<td>".$edad3."</td>";
   			echo"<td>".$regi3['sexo']."</td>";
			echo"<td>".$regi3['tipoafi']."</td>"; 
			echo"<td>".$regi3['parentesco']."</td>";  			
   			echo"<td>".$regi3['grupopobla']."</td>";
   			echo"<td>".$regi3['nivelsisben']."</td>";
			echo"<td>".$regi3['numficha']."</td>"; 
			echo"<td>".$regi3['condicion']."</td>";  			
   			echo"<td>".$regi3['departamento']."</td>";
   			echo"<td>".$regi3['municipio']."</td>";
			echo"<td>".$regi3['zona']."</td>"; 
			echo"<td>".$regi3['feafiliacion']."</td>";  			
   			echo"<td>".$regi3['feeps']."</td>";
   			echo"<td>".$regi3['numcontra']."</td>";
			echo"<td>".$regi3['iniciocontra']."</td>";  			
   			echo"<td>".$regi3['tipo']."</td>";
   			echo"<td>".$regi3['pertenencia']."</td>";
			echo"<td>".$regi3['modalidad']."</td>"; 
			echo"<td>".$regi3['estado']."</td>";
			echo"</tr>";


	     }	


	echo"</table>";

	echo"<br><br>";
	
	echo"<table width=80% align=rigth border=0 class='encab2'>";
	
	echo"<tr>";
	echo"<td>".$filas4." registro(s) encontrado(s) en dgas</td>";
	echo"</tr>";

	echo"</table>";


	echo"<table class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>TIPO DOC</td><td>NUMERO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>F.NACIMIENTO</td><td>EDAD</td><td>SEXO</td><td>TIPO</td><td>CONSE</td><td>DEPARTAMENTO</td><td>MUNICIPIO</td><td>EPS</td><td>P. A LIQUIDAR</td><td>ZONA</td><td>F. AFILIACION</td><td>DIAS</td><td>MODALIDAD</td><td>N. DE PAGO</td><td>CAMBIO EPS</td><td>EPS TRASLADO</td><td>VALOR UPC</td><td>GLOSAS</td>";

	echo"</tr>";

	while($regi4=mysql_fetch_array($resultado4))
	     {
		$fec4=$regi4['fe_nacimiento'];
		$yearact4=substr($today,0,4);	
		$yearnaci4=substr($fec4,6,4);

		$edad4=$yearact4-$yearnaci4;


			echo"<tr class='info'>"; 
   
   			echo"<td>".$regi4['tipoide']."</td>";
   			echo"<td>".$regi4['numide']."</td>";
   			echo"<td>".$regi4['apellido1']."</td>";
   			echo"<td>".$regi4['apellido2']."</td>";
   			echo"<td>".$regi4['nombre1']."</td>";
   			echo"<td>".$regi4['nombre2']."</td>";
   			echo"<td>".$regi4['fe_nacimiento']."</td>";
			echo"<td>".$edad4."</td>";
   			echo"<td>".$regi4['sexo']."</td>";
			echo"<td>".$regi4['tipo']."</td>";
   			echo"<td>".$regi4['consereg']."</td>";
   			echo"<td>".$regi4['departamento']."</td>";
   			echo"<td>".$regi4['municipio']."</td>";
			echo"<td>".$regi4['codeps']."</td>"; 
   			echo"<td>".$regi4['periodoli']."</td>";
   			echo"<td>".$regi4['zona']."</td>";
			echo"<td>".$regi4['fe_afieps']."</td>"; 
			echo"<td>".$regi4['dias']."</td>";
   			echo"<td>".$regi4['modalidad']."</td>";
   			echo"<td>".$regi4['numpago']."</td>";
			echo"<td>".$regi4['cambioeps']."</td>"; 
			echo"<td>".$regi4['epstraslado']."</td>";
   			echo"<td>".$regi4['valorupc']."</td>";
   			echo"<td>".$regi4['glosas']."</td>"; 
			echo"</tr>";


	     }	


	echo"</table>";


	echo"<br><br>";
	
	echo"<table width=80% align=rigth border=0 class='encab2'>";
	
	echo"<tr>";
	echo"<td>".$filas5." registro(s) encontrado(s) en regimen contributivo</td>";
	echo"</tr>";

	echo"</table>";

	echo"<table width=100% class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>TIPO DOC</td><td>NUMERO</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>DEPARTAMENTO</td><td>MUNICIPIO</td><td>ESTADO</td><td>EPS</td>";

	echo"</tr>";


	while($regi5=mysql_fetch_array($resultado5))
	     {
		$fec5=$regi5['fe_nacimiento'];
		$yearact5=substr($today,0,4);	
		$yearnaci5=substr($fec5,6,4);

		$edad5=$yearact5-$yearnaci5;


			echo"<tr class='info'>"; 
   			echo"<td>".$regi5['tipo_ide']."</td>";
   			echo"<td>".$regi5['numide']."</td>";
   			echo"<td>".$regi5['apellido1']."</td>";
   			echo"<td>".$regi5['apellido2']."</td>";
   			echo"<td>".$regi5['nombre1']."</td>";
   			echo"<td>".$regi5['nombre2']."</td>";
   			echo"<td>".$regi5['fe_nacimiento']."</td>";
			echo"<td>".$edad5."</td>";
   			echo"<td>".$regi5['departamento']."</td>";
   			echo"<td>".$regi5['municipio']."</td>";
			echo"<td>".$regi5['estado']."</td>"; 
			echo"<td>".$regi5['codeps']."</td>";  			
			echo"</tr>";


	     }	


	echo"</table>";


	echo"<br><br>";

	echo"<table width=100%  border=0 class='encab2'>";
		
		echo"<tr>";
		echo"<tr>";
		echo"<td>".$filas6." registro(s) encontrado(s) en Id invalidas</td>";		    
		echo"</tr>";

	
	echo"</table>";


	echo"<table width=100% class='inf'>";

	echo"<tr class='campos'>";

	echo"<td>TIPO DOC.</td><td>NUMERO ID.</td><td>APELLIDO 1</td><td>APELLIDO 2</td><td>NOMBRE 1</td><td>NOMBRE 2</td><td>FE. NACIMIENTO</td><td>EDAD</td><td>DEPARTAMENTO</td><td>MUNICIPIO</td><td>EPS</td></tr>";

	echo"</tr>";  


	while($regi6=mysql_fetch_array($resultado6))
	     {

		$fec6=$regi6['fenaci'];
		$yearact6=substr($today,0,4);	
		$yearnaci6=substr($fec6,6,4);

		$edad6=$yearact6-$yearnaci6;

			echo"<tr class='info'>"; 
   			echo"<td>".$regi6['tipoide']."</td>";
   			echo"<td>".$regi6['numide']."</td>";
   			echo"<td>".$regi6['apellido1']."</td>";
   			echo"<td>".$regi6['apellido2']."</td>";
   			echo"<td>".$regi6['nombre1']."</td>";
   			echo"<td>".$regi6['nombre2']."</td>";
   			echo"<td>".$regi6['fenaci']."</td>";
			echo"<td>".$edad6."</td>";
   			echo"<td>".$regi6['departamento']."</td>";
   			echo"<td>".$regi6['municipio']."</td>";
			echo"<td>".$regi6['codeps']."</td>";  			
			echo"</tr>";

		$a=$a+1;

	     }

        echo"</table>"; 




     }//cierre del boton busqueda


	
	echo"<br><br><br>";	

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