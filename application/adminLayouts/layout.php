<?
	$controller = Zend_Controller_Front::getInstance();
	$baseUrl=$controller->getBaseUrl();
	$auth = new Zend_Session_Namespace('Zend_Auth_Admin');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
    <base href="<?=BASE_URL?>/" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> <!-- RESET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> <!-- MAIN STYLE SHEET -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" /> <!-- DEFAULT: 2 COLUMNS -->
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" /> <!-- ALTERNATE: 1 COLUMN -->
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> <!-- MSIE6 -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" /> <!-- GRAPHIC THEME -->
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" /> <!-- WRITE YOUR CSS CODE HERE -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="js/jquery.switcher.js"></script>
	<script type="text/javascript" src="js/toggle.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.tabs.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
		$.tablesorter.defaults.sortList = [[1,0]];
		$("table").tablesorter({
			headers: {
				0: { sorter: false },
				7: { sorter: false }
			}
		});
	});
	</script>
	<title>PlanetDacha.com - Index</title>
</head>

<body>

<div id="main">

	<!-- Tray -->
	<div id="tray" class="box">

		<p class="f-left box">

			<!-- Switcher -->
			<span class="f-left" id="switcher">
				<a href="admin/main" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a>
				<a href="admin/main" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="2 Columns" /></a>
			</span>

			Project: <strong>Planet Dacha.com</strong>

		</p>
		<? if($auth->admin_id) { ?>
		<p class="f-right">User: <strong><a href="admin/main">Administrator</a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="<?=$this->url(array('controller'=>'admin', 'action' => 'logout'))?>" id="logout">Log out</a></strong></p>
		<? } ?>
	</div> <!--  /tray -->

	<hr class="noscreen" />

	<!-- Menu -->
	<div id="menu" class="box">

	
		<ul class="box">
        
        <li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'"><div>
            <a href="admin/changepass"><span>Manage AdminDetails</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
						<li><a href="admin/changepass">Change Password</a></li>
						<li><a href="admin/changemail">Change Email Id</a></li>
						<li><a href="admin/createuser">Create User</a></li>
                       
						
					</ul>
				</div> <!-- /drop -->
			</div></li>
        
        
        
        
			<li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'"><div>
            <a href="admin/alllandlord"><span>Manage Landlord</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
						<li><a href="admin/alllandlord">All Landlord</a></li>
						<li><a href="admin/landlordreg">Add Landlord</a></li>
                        <li><a href="admin/landlordproperty">Landlords Properties</a></li>
						<li><a href="admin/landlordactived">Active Landlord</a></li>
						<li><a href="admin/landlorddeactived">Deactive Landlord</a></li>
					</ul>
				</div> <!-- /drop -->
			</div></li>
            <li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'"><div>
            <a href="admin/allrenter"><span>Manage Guests</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
						<li><a href="admin/allrenter">All Guests</a></li>
						<li><a href="admin/renterreg">Add Guests</a></li>
						<li><a href="admin/renteractived">Active Guests</a></li>
						<li><a href="admin/renterdeactived">Deactive Guests</a></li>
					</ul>
				</div> <!-- /drop -->
			</div></li>
			<li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
            <div><a href="Admin/contactadd"><span>Manage Pages</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
                        <li><a href="Admin/contactadd">All Pages</a></li>
							<li><a href="Admin/viewcontactadd">Add Page</a></li>
						
						</ul>
				</div> <!-- /drop -->
			</div></li>
			<li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
            <div><a href="admin/showproperty"><span>Manage Property</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
						<li><a href="admin/showproperty">All Properties</a></li>
                       
					</ul>
				</div> <!-- /drop -->
			</div></li>
            <li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
            <div><a href="admin/allcity"><span>All City/Country</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
						<li><a href="admin/allcity">All City</a></li>
						<li><a href="admin/allcountry">All Country </a></li>
                         <li><a href="admin/regularanualashow">Regular annual events</a></li>
					</ul>
				</div> <!-- /drop -->
			</div></li>
             <li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
            <div><a href="admin/showbestproperty"><span>Best of the Best Properties</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
						<li><a href="admin/showbestproperty">Best of the Best Properties</a></li>

					</ul>
				</div> <!-- /drop -->
			</div></li>
            
            
            <li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
            <div><a href="admin/showopenenquiry"><span>Show Enquiry</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
						<li><a href="admin/showopenenquiry">Open Enquiry</a></li>
                        <li><a href="admin/showpendingquiry">Pending Enquiry</a></li>
                        <li><a href="admin/showpaidenquiry">Paid Enquiry</a></li>

					</ul>
				</div> <!-- /drop -->
			</div></li>
            
             <li onmouseover="this.className = 'dropdown-on'" onmouseout="this.className = 'dropdown-off'">
            <div><a href="admin/showfeautreproperty"><span>Featured properties</span></a>
				<!-- Dropdown menu -->
				<div class="drop">
					<ul class="box">
						<li><a href="admin/showfeautreproperty">Featured Properties</a></li>

					</ul>
				</div> <!-- /drop -->
			</div></li>
            
            
            
            
		</ul>
		
	</div> <!-- /header -->
    
    
    

	<hr class="noscreen" />

	<!-- Columns -->
    <?=$this->layout()->content ?>
	 <!-- /cols -->

	<hr class="noscreen" />

	<!-- Footer -->
	<div id="footer" class="box">

		<p class="f-left">&copy; 2009 <a href="admin/main">Your Company</a>, All Rights Reserved &reg;</p>

		<p class="f-right">Templates by <a href="http://www.unyscape.com/">Unyscape</a></p>

	</div> <!-- /footer -->

</div> <!-- /main -->

</body>
</html>