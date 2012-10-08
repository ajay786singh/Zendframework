<?php
$result=$this->results;
?>


<article class="module width_3_quarter">
		<div class="tab_container">
			
    <section>
        <form class="form" method="post" action="<?php echo $this->url(array('controller' => 'admin', 'action' => 'useredit'), null, true); ?>?id=<?php echo $result['id']; ?>">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />
            <input type="hidden" name="update_date" value="<?php echo date("Y-m-d H:i:s") ?>" />
            <dl>
                <?php 
                if($this->msg){
                ?>
                <dt><dd><span class="error"><?php echo $this->msg; ?></span></dd></dt>
                <?php } ?>
                <dt><label for="username">Username:</label></dt>
                
                <dd><input name="username" id="username" type="text" class="validate[required]" value="<?php echo $result['username'];?>" disabled /></dd>
                
                <dt><label for="email">Email:</label></dt>
                
                <dd><input name="email" id="email" class="validate[required, custom[email]]" type="text" value="<?php echo $result['email'];?>" /></dd>
            
                <dt><label for="firstname">First Name:</label></dt>
            
                <dd><input name="firstname" id="firstname" type="text" class="validate[required]" value="<?php echo $result['firstname'];?>"/></dd>
            
                <dt><label for="lastname">Last Name:</label> </dt>
            
                <dd><input name="lastname" id="lastname" type="text" value="<?php echo $result['lastname'];?>" /> </dd>
                
                <dt><label for="city">City:</label> </dt>
            
                <dd><input name="city" id="city" type="text" value="<?php echo $result['city'];?>" /> </dd>
            
                
            
           
            <dt class="button">&nbsp;</dt>
            <dd class="button"><input type="submit" class="button" value="Update" />
            
            <span><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true); ?>">Back to list</a></span>
            </dd>
            </dl>

        </form>
        
    </section>	
		</div><!-- end of .tab_container -->
		
</article>