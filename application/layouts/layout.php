<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="en-US"/>
        <base href="<?php echo BASE_URL; ?>" />
        <title><?php echo SITE_TITLE; ?></title> 
        <link href="<?php echo BASE_URL; ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo BASE_URL; ?>/assets/css/form.css" rel="stylesheet" type="text/css"/>
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
            jQuery("#regform").validationEngine();
            jQuery("#regform").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })

        });
</script>
    </head>
    <body>
        <div id="bodyimg">
            <div id="pagebox">
                <div id="top">
                    <h2><a href="<?php echo $this->url(array("controller" => "index", "action" => "index"), null, true) ?>"
                           title="Go to Homepage">
                            <img src="<?php echo BASE_URL; ?>/assets/images/logo.gif" height="93" alt="Logo - Rent A Flat" /></a>
                        <span>
                            <ul id="top-nav">
                                <li><a href="<?php echo $this->url(array('controller' => 'user', 'action' => 'index'), null, true) ?>">Login</a></li>
                                <li><a href="<?php echo $this->url(array('controller' => 'user', 'action' => 'register'), null, true) ?>">Sign up</a></li>
                                <li><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'index'), null, true) ?>">Admin</a></li>    
                            </ul>
                        </span>
                    </h2>
                </div>
                <div id="menu">
                <?php include (APPLICATION_PATH.'/layouts/menu.php') ?>
                </div>
                <div class="container">
                <?php echo $this->layout()->content; ?>
                </div>
                <div id="footbox">
                    <div id="foot">
                        <?php include (APPLICATION_PATH.'/layouts/footer.php') ?>
                <div class="cleaner"></div></div></div>        
            </div>
        </div>
    </body>
</html>