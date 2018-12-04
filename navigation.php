<?php 
require_once('class/Menu.php');
require_once('database/Database.php');//start session at default constructor
$session = new Database();//session is at default constructor
//require_once('class/Laundry.php');
//$menu = $laundry->all_laundry();
//$laundries = $laundry->all_laundry();
//echo $_POST['un'];
$menus = $menu->f_obtener_menu($session->getSession('User'));
 ?>  
      
       <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/veolia_min.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $usuario; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
         <li class="header"><a href="home.php"><i class="fa fa-dashboard"></i>MENÚ PRINCIPAL</a></li>
      <!--  <li class="treeview"><a href="home.php"><i class="fa fa-circle-o"></i>MENÚ PRINCIPAL</a></li> -->
        <?php
           /*Se dibujan los menu segun por el perfil*/
            foreach ($menus as $valor) { ?>
              <li class="treeview">
                    <a href="#">
                       <i class="fa fa-edit"></i>
                    <span ><?php echo $valor['descripcion'] ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a> 
                  <ul class="treeview-menu">
                     <?php
                             // echo $menus;
                                 /*Se dibujan los submenu segun por el perfil*/
                       $submenu = $menu->f_obtener_submenu($session->getSession('User'),$valor['id_menu']);
                                 //echo $submenu;
                             foreach ($submenu as $valor1) { ?>
                               <li>
                                   <a href="<?php echo $valor1['enlace_url'] ?>" ><i class="fa fa-circle-o"></i><?php echo $valor1['descripcion'] ?></a>
                               </li>
                                <?php } ?>      							
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                          <?php } ?>
        
               
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>