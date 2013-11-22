
<?php
require_once('includes/config.php');
require_once('includes/header.php');

?>
<section id="toolbar">
 <div class="container">
  <div class="left hidden-phone">
   <ul class="breadcrumb">
    <li>
     <a href="#">CM and GO</a>
    </li>
    <li>
     <a href="#">Admin</a>
    </li>
    <li>
     <a href="#">Connection</a>
    </li>
   </ul>
  </div>
  <div class="right hidden-phone">
    <ul>
     <li>
      <a href="#"><span class="icon i14_admin-user"></span>Profile</a>
     </li>
     <li>
      <a class="with_red" href="#"><span>3</span>Messages</a>
     </li>
     <li class="space"></li>
     <li>
      <a id="btn-lock" class="with_red" href="#"><span>09:54</span>Lock screen</a>
     </li>
     <li class="red">
      <a href="#">Logout</a>
     </li>
    </ul>
  </div>
 </div>
</section> <!-- Fin tollbar -->

<header class="container">
 <a href="#" class="hidden-phone">
  <img alt="CMandGO" src="img/logo.png">
 </a><span class="titrelogo"><h1>CMandGO</h1>Administrator By CMCAE</span>
 <div class="buttons">
  <a href=""><span class="icon icon-sitemap"></span>Statistics </a>
  <a href=""><span class="icon icon-list-alt"></span>Forms </a>
  <a href=""><span class="icon icon-table"></span>Tables </a>
 </div>
</header>
<div id="main" class="container" role="main">
 <section class="toolbar">
   <div class="toolbaruser">
    <div class="avatar"></div>
     <span>Modules D'administration</span>
   </div>
   <div class="toolbarcenter">
    <span>&nbsp;</span>
   </div>
 
 </section>

 <!-- <div id="leftmenu" class="container" role="leftmenu"> -->
  <aside style="min-height: 643px;">
   bbbbb
  </aside>
 <!-- </div> -->
</div><!--  Fin Container -->
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<p>ici le svg


<svg version = "1.1">
    <path d = "M 0 0 l 100 10  z" stroke = "blue" stroke-width = "3" stroke-dasharray ="5,3,2" stroke-opacity="0.5"/>
    
   
</svg>



<?php


require_once('class/class.users.php');
$users= new Users();
//$DB = new DB();
echo '<br />';
echo 'getServerVersion: '.$DB->getServerVersion().'<br />';
echo 'getServerInfo: '.$DB->getServerInfo().'<br />';
echo 'getClientVersion: '.$DB->getClientVersion().'<br />';
echo 'getDriverName: '.$DB->getDriverName().'<br />';

echo '<br />';
$temp= '550';
$heure=floor( $temp / 60 );
$minutes = $temp % 60 ;
echo $heure.'H'.$minutes.'mn';



include 'includes/footer.php';
?>

