<?php
$msg=$this->err;
?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="en-US"/>
        <base href="<?php echo BASE_URL; ?>" />
         <?php echo $this->headTitle('Admin') ?>
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
	<script src="<?php echo BASE_URL; ?>/assets/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="<?php echo BASE_URL; ?>/assets/js/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo BASE_URL; ?>/assets/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>
<script src="<?php echo BASE_URL; ?>/assets/js/jquery-1.6.min.js" type="text/javascript">
</script>
<script src="<?php echo BASE_URL; ?>/assets/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
</script>
<script src="<?php echo BASE_URL; ?>/assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
</script>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/validationEngine.jquery.css" type="text/css"/>
<script>
   function beforeCall(form, options){
			if (window.console) 
			console.log("Right before the AJAX form validation call");
			return true;
		}
            
    function ajaxValidationCallback(status, form, json, options){
        if (window.console) 
        console.log(status);

        if (status === true) {
       // alert("the form is valid!");
        
        }
    }

        jQuery(document).ready(function(){
            jQuery("#login").validationEngine();
            jQuery("#login").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })

        });
</script>
        

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo ADMIN_URL; ?>">Website Admin</a></h1>
			<div class="btn_view_site"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'login'), null, true) ?>">login</a></div>
                        <div class="btn_view_site"><a href="<?php echo BASE_URL; ?>">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
        <dt align="center">
        <form id="login" method="post" action="<?php echo $this->url(array('controller' => 'admin', 'action' => 'login'), null, true) ?>">
        <table align="center" style="margin-top: 50px;">
             <?php
             if($msg)
             {
             ?>
            <tr><td colspan="2" align="center"><span class="error"><?php echo $msg; ?></span></td></tr>
            <?php }?>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" class="validate[required]" value=""/></td>
                
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" class="validate[required]" value=""/></td>
                
            </tr>
            <tr>
                
                <td colspan="2" align="right"><input type="submit" value="Login"/></td>
                
            </tr>
        </table>
        </form>    
        </dt>
        
        
</body>
</html>