<?php
  require('conexion.php');

  if($_POST[Bin]=="INGRESAR")
  {
   $usu=trim($_POST[Tusu]);
   $pas=trim($_POST[Tpas]);
 	$sql="select * from usuarios where trim(usuario) like'$usu' and trim(password) like '$pas'";
	$resultado=mysql_query($sql,$conectar);
	$row=mysql_num_rows($resultado);
	if ($row > 0) 
	{
		header ("Location:menu.php");
		
	}
	else
	{
		echo "<script>alert('Usuario o Contraseña Incorrecta');</script>";
	}
  }
?>

<html>
 	

      <head>

        <link rel="stylesheet" type="text/css" href="estilosacce.css">
  	<title>Acceso De Usuarios</title>

      </head>

<body>

<form name=registro method=post action=acceso.php>

<br><br><br><br><br><br><br><br>
   <table width=30% border=0 align=center class=encab>
   	<tr>
   	 <td><center>Acceso De Usuarios</center></td>
   	</tr>
   </table> 	

<br>
   <table width=30% border=0 align=center class=encab2>

   	<tr>
   	 <td>Usuario</td>
   	 <td>Contraseña</td>
   	</tr>

	<tr>
     	 <td width=50%><input type=text name=Tusu value="" size=25 maxlength=10></td>
     	 <td><input type=password name=Tpas value="" size=25 maxlength=20></td>
    </tr>
   </table>

   <table width=30% border=0 align=center>
	<tr>
         <td><input type=submit name=Bin value=INGRESAR class=ingresar></td>
	</tr>
   </table>

  </form>
 </body>
</html>

