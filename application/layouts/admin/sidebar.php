		<?php $url=Zend_Controller_Front::getInstance()->getRequest()->getActionName();
                $add=$_REQUEST['add'];
                ?>
		<hr/>
		
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true) ?>?add=true" <?php if($add=='true'){ echo "class=active";}?>>Add New User</a></li>
			<li class="icn_view_users"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true) ?>" <?php if($url=='users' && $add==''){ echo "class=active";} ?> >View Users</a></li>
		</ul>
<!--		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_add"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'library'), null, true) ?>?add=true">Add new</a></li>
			<li class="icn_photo"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'library'), null, true) ?>">Library</a></li>
			
		</ul>-->
                <h3>Property</h3>
                <ul class="toggle">
                    <li class="icn_add"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=new">Add New</a></li> 
                    <li class="icn_photo"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=list">View List</a></li>
                </ul>
		<h3>Admin</h3>
		<ul class="toggle">
<!--			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>-->
			<li class="icn_jump_back"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'logout'), null, true) ?>">Logout</a></li>
		</ul>
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2012 Admin</strong></p>
			<p>Theme by <a href="<?php echo BASE_URL; ?>" target="_blank">Ajay Deep Singh</a></p>
		</footer>