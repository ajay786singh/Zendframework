<article class="module width_3_quarter">
		<div class="tab_container">
			
    <section>
        <form class="form" method="post" action="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true); ?>">
         <input type="hidden" name="mode" value="add"/>
         <input type="hidden" name="create_date" value="<?php echo date("Y-m-d H:i:s") ?>" />
            <dl>
                <?php 
                if($this->msg){
                ?>
                <dt><dd><span class="error"><?php echo $this->msg; ?></span></dd></dt>
                <?php } ?>
                <dt><label for="username">Username*:</label></dt>
                
                <dd><input name="username" id="username" class="validate[required]" type="text" value="" /></dd>
                
                <dt><label for="password">Password*:</label></dt>
                
                <dd><input name="password" id="password" class="validate[required]" type="password" value="" /></dd>
                
                <dt><label for="email">Email*:</label></dt>
                
                <dd><input name="email" id="email" class="validate[required, custom[email]]" type="text" value="" /></dd>
            
                <dt><label for="firstname">First Name*:</label></dt>
            
                <dd><input name="firstname" id="firstname" class="validate[required]" type="text" value=""/></dd>
            
                <dt><label for="lastname">Last Name:</label> </dt>
            
                <dd><input name="lastname" id="lastname" type="text" value="" /> </dd>
                
                <dt><label for="city">City:</label> </dt>
            
                <dd><input name="city" id="city" type="text" value="" /> </dd>
            
                
            
           
            <dt class="button">&nbsp;</dt>
            <dd class="button"><input type="submit" class="button" value="Add" />
               <span><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true); ?>">Back to list</a></span>
            </dd>
            </dl>

        </form>
        
        
    </section>	
		</div><!-- end of .tab_container -->
		
</article>