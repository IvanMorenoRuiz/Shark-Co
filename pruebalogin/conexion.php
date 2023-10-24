<?php
 $dbserver="localhost";
 $dbuser="root";
 $dbpwd="";
 $dbbasedatos="usuarios";


 try{
 $conn = @mysqli_connect($dbserver,$dbuser,$dbpwd,$dbbasedatos);

}catch(mysqli_sql_exception $e){
   die("no hay conexion" .$e->getMessage());
   die();

}
