<?php
    $controller = Zend_Controller_Front::getInstance();
    $baseUrl=$controller->getBaseUrl();
    $auth = new Zend_Session_Namespace('Zend_Auth_Admin');
?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="en-US"/>
        <base href="<?php echo BASE_URL; ?>" />
         <?php echo $this->headTitle('Admin'); ?>
        <meta name="keywords" content="flat, rental, home, low prices" />
        <meta name="description" content="Sample Zend framework project for NetBeans" />
        <meta name="author" content="Oracle corp." />
        <meta name="copyright" content="(c) 2010 Oracle" />
        <meta name="robots" content="all,index,follow" />
        <meta name="revisit-after" content="14 day" />
        <meta name="expires" content="never" />
        <meta name="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
	
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>/assets/js/hideshow.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function()
{
    $('.deleteuser').click(function()
    {
       var did=$(this).attr('id');
       var data='id='+did+"&mode=delete";
       var url="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true) ?>";
        $.ajax({
        type: 'POST',
        url: url,
        async: false,
        data: data,
        success: function(responseText) {

        }
        });
    });
  
    $('.deleteproperty').click(function()
    {
       var did=$(this).attr('id');
       var data='id='+did+"&mode=delete";
      alert(data);
    });
   
   
    // add multiple select / deselect functionality
	$(".checkall").click(function () {
		  $('.case').attr('checked', this.checked);
	});

	// if all checkbox are selected, check the selectall checkbox
	// and viceversa
	$(".case").click(function(){

		if($(".case").length == $(".case:checked").length) {
			$(".checkall").attr("checked", "checked");
		} else {
			$(".checkall").removeAttr("checked");
		}

	});

});

  </script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo ADMIN_URL; ?>">Website Admin</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="<?php echo BASE_URL; ?>">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	<section id="secondary_bar">
		<div class="user">
                    <?php 

                    if($auth->admin_id){                                    
                    ?>
                   <p><?php echo "Welcome ".$auth->username ?> (<a href="#">0 Messages</a>)</p>
                   <a class="logout_user" href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'logout'), null, true) ?>" title="Logout">Logout</a>
                    <?php } ?>
			
			 
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo ADMIN_URL; ?>">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
           <?php include(APPLICATION_PATH.'/layouts/admin/sidebar.php') ?>
		
	</aside><!-- end of sidebar -->
	<section id="main" class="column">
	<?php echo $this->layout()->content ?> 
        </section>        
</body>
<script src="<?php echo BASE_URL; ?>/assets/js/jquery-1.6.min.js" type="text/javascript">
</script>
<script src="<?php echo BASE_URL; ?>/assets/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
</script>
<script src="<?php echo BASE_URL; ?>/assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
</script>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/validationEngine.jquery.css" type="text/css"/>
<script>

        jQuery(document).ready(function(){
            jQuery(".form").validationEngine();
            jQuery(".form").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
            
    
        });
       
</script>

</html>