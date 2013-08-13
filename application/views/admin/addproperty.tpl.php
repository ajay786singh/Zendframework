<?php $users=$this->users;?>
<article class="module_content">

    <h1>Add New Property </h1>

</article>
<article class="module width_3_quarter">
		<div class="tab_container">
			
    <section>
        <form class="form" method="post" action="<?php echo $this->url(array('controller' => 'admin', 'action' => 'addproperty'), null, true); ?>">
         <input type="hidden" name="mode" value="add">
         <input type="hidden" name="created_on" value="<?php echo date('Y-m-d H:i:s') ?>">
            <dl>
                <dt><label for="landlord_id">Landlord*:</label></dt>
                
                <dd>
                    <select name="landlord_id" class="validate[required]" style="width: 175px;">
                        <option value="">Select Landlord</option>
                        <?php foreach($users as $user){ ?>
                        <option value="<?php echo $user['id'];?>"><?php echo $user['username'].' &lt;'.$user['email']."&gt;";?></option>
                        <?php } ?>
                    </select>
                </dd>
                
                <dt><label for="Title">Title*:</label></dt>
            
                <dd><input name="title" id="title" class="validate[required]" type="text" value=""></dd>
            
                <dt><label for="Summary">Summary*:</label> </dt>
            
                <dd><input name="summary" id="summary" type="text" value="" class="validate[required]" /> </dd>
                
                <dt><label for="Location">Location*:</label> </dt>
            
                <dd><input name="location_id" id="location_id" type="text" value="" class="validate[required]" /> </dd>
                <dt><label for="Property Status">Property Status</label></dt>
                <dd><select name="status">
                        <option value="0">Inactive</option>
                        <option value="1">Active</option>
                    </select></dd>      
                <dt class="button">&nbsp;</dt>
                
                <dd class="button"><input type="submit" class="button" value="Add Property"></dd>
            </dl>

        </form>
        
        
    </section>	
		</div><!-- end of .tab_container -->
		
</article>    