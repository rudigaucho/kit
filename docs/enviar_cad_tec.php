<?php  include "conn.php";  ?>










<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="css/style.css" rel="stylesheet">
<link rel="icon" href="img/icon.ico">

<script type="text/javascript">
function saidasuccessfully()
{
	setTimeout("window.location='cadastro_tec.php'",3000);
	
	
}
</script> 


<link rel="icon" href="img/logo.png">

<link rel="stylesheet" href="estilopres.css"/>

<meta charset="UTF-8"/>

<title>Cadastro de técnicos</title>


</head>



<body>








<?php



$mat =$_POST['mat'];
$nome =$_POST['nome']; 
$nome_ga =$_POST['nome_ga'];
$mat_ga =$_POST['mat_ga'];
$estado =$_POST['estado'];
$obs =$_POST['obs'];
$contato =$_POST['contato'];
$email =$_POST['email'];
$skill =$_POST['skill'];

$sql2 = mysql_query ("select * from tecnico where matricula = '$mat' " );
$row2 = mysql_num_rows($sql2);



if  ($row2 >= 1)
{


    echo "
    <script language='JavaScript'>
    window.alert('TÉCNICO JÁ CADASTRADO, VERIFIQUE!')
    
    </script>";

    echo "<script>saidasuccessfully()</script>";
  
    
    
  
   
   
  

  
}


else 
{

$query = "insert into tecnico (matricula,nome,skill,nome_ga,matricula_ga,estado,obs,contato,email)";

$query.= "values ('$mat','$nome','$skill','$nome_ga','$mat_ga','$estado','$obs','$contato','$email')";















$sql = mysql_query($query);



if($sql)
{
  
  
  echo "
  <script language='JavaScript'>
  window.alert('CADASTRADO COM SUCESSO!')
  
  </script>";

  echo "<script>saidasuccessfully()</script>";
  

 ;
  

  
}
else
{
  
  echo "<script language='JavaScript'>
   window.alert('ERRO NO CADASTRO!');
   </script> " ;
  
}







}
?>

























</body>


</html>