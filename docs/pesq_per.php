﻿<?php 
         include "conn.php"; 
      
         session_start();

     
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="img/serede.png"> 

  
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Serede</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php">Serede</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        <!--Notification Menu-->
       
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" style="width:38px; height:40px;" src="img/serede.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['nome'];?> </p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['acesso'];?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item " href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="cadastro.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Cadastro Técnico</span></a></li>
        
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Lista Colaboradores</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tabelas</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">

        
          <div class="tile">
          
            <div class="table-responsive">
            
              <table class="table table-hover table-bordered" id="myTable">
                <thead>
                  <tr>
                
                                <th width="20%">Id</th>
                                <th width="30%">Nome</th>
                                <th width="15%">Função</th>
                                <th width="15%">Inventario</th>
                                
                    
                    
                  </tr>
                </thead>

<?php
  
  

$id = $_GET['id'];


if ($_SESSION['acesso'] == 'ADM')
{

  $sql = mysql_query ("SELECT * FROM colaborador group by id_ga" );
}
else
{
    $sql = mysql_query ("select * from colaborador where id_ga  = '".$_SESSION['id']."' group by nome" );

}

    $row = mysql_num_rows($sql);

 
 

    if (mysql_num_rows($sql) > 0)
    {
      while ($dado = mysql_fetch_assoc($sql))
      
        {
     
      

?>
                <tbody>
                     



                  <tr>
                    
                    <td> <?php if ($_SESSION['acesso'] == 'ADM') { echo $dado ["id_ga"]; } else echo $dado ["id_tec"];  ?></td>
                    <td> <?php if ($_SESSION['acesso'] == 'ADM') { echo $dado ["nome_ga"]; } else echo $dado ["nome"];  ?></td>
                    <td><?php if ($_SESSION['acesso'] == 'ADM') { echo "Gestor"; } else echo $dado ["funcao"];  ?></td>
                    
                   



<?php if ($_SESSION['acesso'] == 'ADM') { ?>
<td> <a style="color:black;" href="table-data-table2.php?id=<?php echo $dado ["id_ga"]; ?>"  role="button" aria-pressed="true"><i class="fa fa-file-text" aria-hidden="true"></i></a></td>
<?php } else { ?>



<td> <a style="color:black;" href="table-data-table.php?id=<?php echo $dado ["id_tec"]; ?>   role="button" aria-pressed="true"><i class="fa fa-file-text" aria-hidden="true"></i></a></td>
<?php } ?>


                    
                    
                  </tr>
      <?php 
                      
      } 
         
    } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    
    <!-- Essential javascripts for application to work-->

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>

  
  </body>
</html>