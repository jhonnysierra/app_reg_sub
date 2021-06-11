<?php

   header("content-type:application/vnd.ms-excel");
   header("expires:0");
   header("cache-control:must-revalidate,post-check=0,pre-check=0");
   header("content-disposition:attachment;filename=reporte.xls");

?>

<?php

   REQUIRE('men18sisben.php');
?>