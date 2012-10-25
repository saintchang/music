<?php 
	$this->load->helper('url');
?>
<html>
<head>
	<title><?=$template_collect["title"] ?> </title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	  <link href=<?=base_url("/content/Site.css")?> rel="stylesheet" 
        type="text/css" />
		<script src=<?=base_url("/Scripts/jquery-1.5.1.min.js")?> 
        type="text/javascript"></script>
</head>
<body>
	<div id="header">
        <h1><a href="/">PHP CI MUSIC STORE</a></h1>
        <ul id="navlist">
            <li class="first"><?php echo anchor('','Home')  ?> </li>
            <li><?=anchor("store_controller","Store")?> </li>
            <li><?=anchor("shopping_cart_controller","Cart (" 
						. $template_collect["cart_count"] .")"
									,array('id' => 'cart-status')) ?></li>
            <li><?=anchor("store_manager_controller","Admin")?></li>
        </ul>        
    </div>
	<ul id="categories">
		<?php				
		foreach($template_collect["genre"] as $g)
		{
			echo "<li>" . anchor("store_controller/browse/" . $g["Name"] 
				,$g["Name"]) . "</li>" ;			
		}		
		?>
	</ul>
	<div id="main">
	<?php $this->load->view($template_collect["include"]); ?>
	</div>
<div id="footer">
	built with <a href="http://www.codeigniter.org.tw/">CodeIgniter <?=CI_VERSION?></a>
</div>
</body>
</html>	
