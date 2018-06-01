<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <title>Driver service kabbi</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
      <div style="display: none;" id="data_base"></div>
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="index.html">Driver kabbi</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a></li>
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a></li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="/images/logo.png" alt="User Image"></div>
            <div class="pull-left info">
              <p>Driver v.1.1.0</p>
              <p class="designation">Driver kabbi service</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.html"><i class="fa fa-dashboard"></i><span>Main</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>UserMap</span><i class="fa fa-angle-right"></i></a></li>
            <li><a href="#"><i class="fa fa-pie-chart"></i><span>UserDirect</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>UserSEO</span><i class="fa fa-angle-right"></i></a></li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Driver kabbi service</h1>
            <p>Multiuser taxi service for driver</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Main</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <!---------------------------------------->
           <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Select the order
              </h3>
                <!--------------------------------->
            <div class="card">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>First Passanger</th>
                    <th>Start point</th>
                    <th>Finish point</th>
                    <th>First distance</th>
                    <th>First time</th>
                    <th>Second Passanger</th>
                    <th>Start point</th>
                    <th>Finish point</th>
                    <th>Second distance</th>
                    <th>Second time</th>
                    <th>All distance</th>
                    <th>All time</th>
                  </tr>
                </thead>
                <tbody>
            <?php
                require('get_mysql.php');
                foreach($res_addr as $addr)                 
                {
                    echo '<tr>';
                    echo '<td>',$addr['fname'],'</td>';
                    echo '<td>',$addr['fstart'],'</td>';
                    echo '<td>',$addr['ffinish'],'</td>';
                    echo '<td>',$addr['first_distance'],'</td>';
                    //echo '<td>',0,'</td>';
                    echo '<td>',$addr['first_time'],'</td>';
                    
                    echo '<td>',$addr['sname'],'</td>';
                    echo '<td>',$addr['sstart'],'</td>';
                    echo '<td>',$addr['sfinish'],'</td>';
                    echo '<td>',$addr['second_distance'],'</td>';
                    echo '<td>',$addr['second_time'],'</td>';
                    
                    echo '<td>',$addr['all_distance'],'</td>';
                    echo '<td>',$addr['all_time'],'</td>';
                    echo '</tr>';
                }
            ?> 
            <!--?php
                require('get_mysql.php');
                foreach($res_addr as $addr)                 
                {
                    echo '<tr>';
                    echo '<td>',0,'</td>';
                    echo '<td>',0,'</td>';
                    echo '<td>',0,'</td>';
                    echo '<td>',$addr['first_distance'],'</td>';
                    echo '<td>',0,'</td>';
                    echo '<td>',0,'</td>';
                    echo '<td>',0,'</td>';
                    echo '<td>',$addr['second_distance'],'</td>';                    
                    echo '<td>',$addr['all_distance'],'</td>';
                    //echo '<td>','ZERO','</td>';
                    echo '</tr>';
                }
            ?-->
                </tbody>
              </table>
              <!--?php
              echo '<pre>';
              print_r($res_addr);
              echo '</pre>';
              ?-->
            </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <!------------------------------------------------------------------------------------------->
    <script type="text/javascript">
  </body>
</html>