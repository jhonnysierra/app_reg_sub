<html>

    <head>

          <link rel="stylesheet" type="text/css" href="estilos9.css">

          <title>SECRETARIA DE SALUD</title>

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

   <body>

        <form name=consulta method=post action=menu.php>

        <?php $fechaact=date("d-m-Y");?>

   <table width="800" border="0" align="center" class='encab1'>
     <tr>
       <td><div align="center">
         <p>SECRETARIA DE SALUD MUNICIPAL</p>
         <p>CAICEDONIA VALLE </p>
       </div></td>
     </tr>
   </table>
   <p>&nbsp;</p>
   <p>
     <?php $fechaact=date("d-m-Y");

        echo"<table width=20%  border=0 class='encab2'>";
                
                echo"<tr>";
                echo"<td>Fecha: ".$fechaact."</td>";
                echo"</tr>";
                

        echo"</table>";
        
        ?>
   </p>
 
   <table width="100%" border="0">
     <tr>
       <td><link rel="stylesheet" href="cbcscbinsmenu.css" type="text/css" />

         <div align="center">
           <ul id="ebul_cbinsmenu_1" class="ebul_cbinsmenu" style="display: none;">
             <li><a title="">Homónimos</a>
                        <ul id="ebul_cbinsmenu_1_1">
                                   <li><a href="homocontri.php" title="">Por documento</a></li>
                          <li><a href="homocontri2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Identidades invalidas</a>
                        <ul id="ebul_cbinsmenu_1_4">
                                   <li><a href="men18contri.php" title="">Necesitan tarjeta de identidad</a></li>
                          <li><a href="may18contri.php" title="">Necesitan cedula</a></li>
                        </ul>
             </li>
             <li><a href="http://localhost/phpmyadmin/tbl_structure.php?db=salud&token=a9cf4feafb1ddd9d4a2cd4bd0d71df93&table=contributivo" target="_blank" title="">Eliminar informacion</a></li>
             <li><a href="http://localhost/phpmyadmin/tbl_import.php?db=salud&table=contributivo&token=0b4da561d22c3c89f865c0ea50bbc422&goto=tbl_structure.php&back=tbl_structure.php" target="_blank" title="">Importar datos</a></li>
             <li><span class="ebul_imgcbinsmenu24x24" style="background-image: url('cbsiicbinsmenu_1.gif')"></span><a href="actcontri.php" title="">Actualizar</a></li>
           </ul>
           <ul id="ebul_cbinsmenu_2" class="ebul_cbinsmenu" style="display: none;">
             <li><a title="">Homónimos</a>
                        <ul id="ebul_cbinsmenu_2_10">
                                   <li><a href="homodgas.php" title="">Por documento</a></li>
                          <li><a href="homodgas2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Identidades invalidas</a>
                        <ul id="ebul_cbinsmenu_2_13">
                                   <li><a href="men18dgas.php" title="">Necesitan tarjeta de identidad</a></li>
                          <li><a href="may18dgas.php" title="">Necesitan cedula</a></li>
                        </ul>
             </li>
             <li><a href="http://localhost/phpmyadmin/tbl_structure.php?db=salud&token=a9cf4feafb1ddd9d4a2cd4bd0d71df93&table=dgas" target="_blank" title="">Eliminar informacion</a></li>
             <li><a href="http://localhost/phpmyadmin/tbl_import.php?db=salud&table=dgas&token=0b4da561d22c3c89f865c0ea50bbc422&goto=tbl_structure.php&back=tbl_structure.php" target="_blank" title="">Importar datos</a></li>
             <li><span class="ebul_imgcbinsmenu24x24" style="background-image: url('cbsiicbinsmenu_2.gif')"></span><a href="actdgas.php" title="">Actualizar</a></li>
           </ul>
           <ul id="ebul_cbinsmenu_3" class="ebul_cbinsmenu" style="display: none;">
             <li><a title="">Homónimos</a>
                        <ul id="ebul_cbinsmenu_3_19">
                                   <li><a href="homoregsub.php" title="">Por documento</a></li>
                          <li><a href="homoregsub2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Identidades invalidas</a>
                        <ul id="ebul_cbinsmenu_3_22">
                                   <li><a href="men18regsub.php" title="">Necesitan tarjeta de identidad</a></li>
                          <li><a href="may18regsub.php" title="">Necesitan cedula</a></li>
                        </ul>
             </li>
             <li><a href="http://localhost/phpmyadmin/tbl_structure.php?db=salud&token=a9cf4feafb1ddd9d4a2cd4bd0d71df93&table=regsub" target="_blank" title="">Eliminar informacion</a></li>
             <li><a href="http://localhost/phpmyadmin/tbl_import.php?db=salud&table=regsub&token=0b4da561d22c3c89f865c0ea50bbc422&goto=tbl_structure.php&back=tbl_structure.php" target="_blank" title="">Importar datos</a></li>
             <li><span class="ebul_imgcbinsmenu24x24" style="background-image: url('cbsiicbinsmenu_3.gif')"></span><a href="actregsub.php" title="">Actualizar</a></li>
           </ul>
           <ul id="ebul_cbinsmenu_4" class="ebul_cbinsmenu" style="display: none;">
             <li><a title="">Homónimos</a>
                        <ul id="ebul_cbinsmenu_4_28">
                                   <li><a href="homoregsubval.php" title="">Por documento</a></li>
                          <li><a href="homoregsubval2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Identidades invalidas</a>
                        <ul id="ebul_cbinsmenu_4_31">
                                   <li><a href="men18regsubval.php" title="">Necesitan tarjeta de identidad</a></li>
                          <li><a href="may18regsubval.php" title="">Necesitan cedula</a></li>
                        </ul>
             </li>
             <li><a href="http://localhost/phpmyadmin/tbl_structure.php?db=salud&token=a9cf4feafb1ddd9d4a2cd4bd0d71df93&table=regsubvalido" target="_blank" title="">Eliminar informacion</a></li>
             <li><a href="http://localhost/phpmyadmin/tbl_import.php?db=salud&table=regsubvalido&token=0b4da561d22c3c89f865c0ea50bbc422&goto=tbl_structure.php&back=tbl_structure.php" target="_blank" title="">Importar datos</a></li>
             <li><span class="ebul_imgcbinsmenu24x24" style="background-image: url('cbsiicbinsmenu_4.gif')"></span><a href="actregsubval.php" title="">Actualizar</a></li>
           </ul>
           <ul id="ebul_cbinsmenu_5" class="ebul_cbinsmenu" style="display: none;">
             <li><a title="">Homónimos</a>
                        <ul id="ebul_cbinsmenu_5_37">
                                   <li><a href="homosisben.php" title="">Por documento</a></li>
                          <li><a href="homosisben2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Identidades invalidas</a>
                        <ul id="ebul_cbinsmenu_5_40">
                                   <li><a href="men18sisben.php" title="">Necesitan tarjeta de identidad</a></li>
                          <li><a href="may18sisben.php" title="">Necesitan cedula</a></li>
                        </ul>
             </li>
             <li><a title="">Priorizados</a>
                        <ul id="ebul_cbinsmenu_5_43">
                                   <li><a href="sis-rs-con.php" title="">Por documento</a></li>
                          <li><a href="sis-rs-con2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a href="http://localhost/phpmyadmin/tbl_structure.php?db=salud&token=a9cf4feafb1ddd9d4a2cd4bd0d71df93&table=sisben" target="_blank" title="">Eliminar informacion</a></li>
             <li><a href="http://localhost/phpmyadmin/tbl_import.php?db=salud&table=sisben&token=0b4da561d22c3c89f865c0ea50bbc422&goto=tbl_structure.php&back=tbl_structure.php" target="_blank" title="">Importar datos</a></li>
             <li><span class="ebul_imgcbinsmenu24x24" style="background-image: url('cbsiicbinsmenu_5.gif')"></span><a href="actsisben.php" title="">Actualizar</a></li>
           </ul>
           <ul id="ebul_cbinsmenu_6" class="ebul_cbinsmenu" style="display: none;">
             <li><a title="">Subsidiado - Contributivo</a>
                        <ul id="ebul_cbinsmenu_6_49">
                                   <li><a href="regsubcontri.php" title="">Por documento</a></li>
                          <li><a href="regsubcontri2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Subsidiado - Sisben</a>
                        <ul id="ebul_cbinsmenu_6_52">
                                   <li><a href="regsub-sis.php" title="">Por documento</a></li>
                          <li><a href="regsub-sis2.php" title="">Por nombres</a></li>
                          <li><a href="regsub-sis3.php" title="">Por ficha</a></li>
                        </ul>
             </li>
             <li><a title="">Id inval - dgas (SI)</a>
                        <ul id="ebul_cbinsmenu_6_56">
                                   <li><a href="idinval-dgas.php" title="">Por documento</a></li>
                          <li><a href="idinval-dgas2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Id inval - dgas (NO)</a>
                        <ul id="ebul_cbinsmenu_6_59">
                                   <li><a href="idinval-dgas3.php" title="">Por documento</a></li>
                          <li><a href="idinval-dgas4.php" title="">por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Id inval -  Sisben (SI)</a>
                        <ul id="ebul_cbinsmenu_6_62">
                                   <li><a href="idinval-sis.php" title="">Por documento</a></li>
                          <li><a href="idinval-sis2.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Id inval - Sisben (NO)</a>
                        <ul id="ebul_cbinsmenu_6_65">
                                   <li><a href="idinval-sis3.php" title="">Por documento</a></li>
                          <li><a href="idinval-sis4.php" title="">Por nombres</a></li>
                        </ul>
             </li>
             <li><a title="">Id inval - Subsidiado (SI)</a>
                        <ul id="ebul_cbinsmenu_6_68">
                                   <li><a href="idinval-regsub.php" title="">Por documento</a></li>
                          <li><a href="idinval-regsub2.php" title="">Por nombre</a></li>
                        </ul>
             </li>
             <li><a title="">Id inval - Subsidiado (NO)</a>
                        <ul id="ebul_cbinsmenu_6_71">
                                   <li><a href="idinval-regsub3.php" title="">Por documento</a></li>
                          <li><a href="idinval-regsub4.php" title="">Por nombres</a></li>
                        </ul>
             </li>
           </ul>
           <ul id="cbinsmenuebul_table" class="cbinsmenuebul_menulist" style="width: 1229px; height: 45px;">
                    <li class="spaced_li"><a><img id="cbi_cbinsmenu_1" src="ebbtcbinsmenu1_0.gif" name="ebbcbinsmenu_1" width="227" height="45" style="vertical-align: bottom;" border="0" alt="Régimen  Contributivo" title="" /></a></li>
             <li class="spaced_li"><a><img id="cbi_cbinsmenu_2" src="ebbtcbinsmenu2_0.gif" name="ebbcbinsmenu_2" width="80" height="45" style="vertical-align: bottom;" border="0" alt="DGAS" title="" /></a></li>
             <li class="spaced_li"><a><img id="cbi_cbinsmenu_3" src="ebbtcbinsmenu3_0.gif" name="ebbcbinsmenu_3" width="218" height="45" style="vertical-align: bottom;" border="0" alt="Régimen  Subsidiado" title="" /></a></li>
             <li class="spaced_li"><a><img id="cbi_cbinsmenu_4" src="ebbtcbinsmenu4_0.gif" name="ebbcbinsmenu_4" width="295" height="45" style="vertical-align: bottom;" border="0" alt="Régimen Subsidiado Validado" title="" /></a></li>
             <li class="spaced_li"><a><img id="cbi_cbinsmenu_5" src="ebbtcbinsmenu5_0.gif" name="ebbcbinsmenu_5" width="89" height="45" style="vertical-align: bottom;" border="0" alt="Sisben" title="" /></a></li>
             <li class="spaced_li"><a><img id="cbi_cbinsmenu_6" src="ebbtcbinsmenu6_0.gif" name="ebbcbinsmenu_6" width="199" height="45" style="vertical-align: bottom;" border="0" alt="Cruzar Informacion" title="" /></a></li>
             <li><a href="buscar.php"><img id="cbi_cbinsmenu_7" src="ebbtcbinsmenu7_0.gif" name="ebbcbinsmenu_7" width="115" height="45" style="vertical-align: bottom;" border="0" alt="Buscar" title="" /></a></li>
           </ul>
           <script type="text/javascript" src="cbjscbinsmenu.js"></script>
       &nbsp;</div></td>
     </tr>
   </table>
   <p>&nbsp;</p>
   <table width="800" border="0" align="center">
     <tr>
       <td><div align="center"><img src="escudocaice.jpg" width="200" height="200"></div></td>
       <td><div align="center"><img src="800px-Caicedonia,_Valle,_Colombia_(bandera)_svg.png" width="200" height="200"></div></td>
       <td><div align="center"><img src="logo_alcaldia_1_jpeg_45.jpg" width="200" height="200"></div></td>
     </tr>
   </table>
   <p>&nbsp;</p>

</form>
</body>
</html>

