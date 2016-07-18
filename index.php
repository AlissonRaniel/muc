<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br" >  
<head> 
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<link rel="stylesheet" href="visao/css/reset-min.css" type="text/css" /> 
	<link rel="stylesheet" type="text/css" media="all" href="visao/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="visao/css/style.css" />
	
	<link href="templates/cormus/favicon.ico" rel="shortcut icon" type="visao/image/x-icon" />
	<script type="text/javascript" src="visao/js/jquery_1.9.1.min.js"></script>
	<script type="text/javascript" src="visao/js/script.js"></script>

</head> 
<body> 
	<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="container">
					<?php require_once 'visao/topo/topo.php'; ?>
			</div><!--/container-->
	</div><!--/topo-->	
	<div class="container">     
		<div id="centro">
		   <?php 
				$page = (isset($_GET['page'])? $_GET['page'] : 0 );
				switch ($page) {
					case 0:
						require_once 'visao/centro/centro.php'; 
						break;
					case 1:
						require_once 'visao/centro/addAtor.php'; 
						break;
					case 2:
						require_once 'visao/centro/listAtor.php'; 
						break;
					case 3:
						require_once 'visao/centro/addCaso.php'; 
						break;
					case 4:
						require_once 'visao/centro/listCaso.php'; 
						break;
					default :
						require_once 'visao/centro/centro.php'; 
						break;
				}
		   ?>
			</div>
	</div><!--/container-->
	<div id="rodape">
			<div class="container">
					<?php require_once 'visao/rodape/rodape.php'; ?>
			</div><!--/container--> 
	</div><!--/rodape-->
	<script type="text/javascript" src="visao/js/bootstrap.min.js"></script>
</body>
</html>