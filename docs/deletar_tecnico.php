
<?php
include "conn.php";
session_start();
$matricula =$_GET['matricula'];

if(!isset($_SESSION["login"]) &&  !isset($_SESSION["senha"])  )
{
  header("Location: index.html");
  exit;
  
  
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

<link rel="icon" href="img/logo_oi.ico">

<script type="text/javascript">
function saidasuccessfully()
{
    setTimeout("window.location='dashboard.php'",1000);
  
  
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Serede</title>

<link rel="icon" href="img/icon.ico">
</head>



<body>








<?php












$query = "delete from tecnico where matricula = '$matricula'";






$sql = mysql_query($query);


if($sql )
{
  
  
    echo "
    <script language='JavaScript'>
    window.alert('DELETADO COM SUCESSO!')
    
    </script>";
  
    echo "<script>saidasuccessfully()</script>";

 
  

  
}
else
{
  
    echo "<script language='JavaScript'>
    window.alert('ERRO!');
    </script> " ;
  
}




 

?>

























</body>


</html>