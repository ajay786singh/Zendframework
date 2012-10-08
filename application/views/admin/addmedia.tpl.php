<article class="module width_3_quarter">
		<div class="tab_container">
			
    <section>
<?php /*       <form class="form" method="post" action="<?php echo $this->url(array('controller' => 'admin', 'action' => 'library'), null, true); ?>">
         <input type="hidden" name="mode" value="add"/>
         <input type="hidden" name="create_date" value="<?php echo date("Y-m-d H:i:s") ?>" />
            <dl>
                <?php 
                if($this->msg){
                ?>
                <dt><dd><span class="error"><?php echo $this->msg; ?></span></dd></dt>
                <?php } ?>
                <dt><label for="Title">Image*:</label></dt>
                
                <dd><input name="image" class="validate[required]" type="file" /></dd>
                
               
            
           
            <dt class="button">&nbsp;</dt>
            <dd class="button"><input type="submit" class="button" value="Add" />
               <span><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'library'), null, true); ?>">Back to list</a></span>
            </dd>
            </dl>

        </form> */?>
        <?php echo $this->form; ?>
    </section>	
		</div><!-- end of .tab_container -->
		
</article>