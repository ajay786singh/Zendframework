<?php
$results=$this->paginator;
?>
<article class="module width_3_quarter">
		<div class="tab_container">
			
		<section>
                <?php 
                if($this->msg){
                ?>
                <dt><dd><span class="error"><?php echo $this->msg; ?></span></dd></dt>
                <?php } ?>
                    
<table class="zebra"> 
     <thead>
    <tr> 
        <th><input type="checkbox" name="selectall" class="checkall" /></th>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>City</th>
        <th>Action</th>
        
    </tr>
     </thead>
     <tbody>
    <?php foreach($results as $result)
    {
        $i=1;
     ?>
   
    <tr> 
            <td><input type="checkbox" class="case"  name="users" value="<?php echo $result['id']; ?>" /></td>
        <td><?php echo $result['username']; ?></td>
        <td><?php echo $result['firstname']." ".$result['lastname'] ; ?></td>
        <td><?php echo $result['email']; ?></td>
        <td><?php echo $result['city']; ?></td>
        <td><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'useredit'), null, true) ?>?id=<?php echo $result['id']; ?>" title="Edit"><img src="<?php echo BASE_URL; ?>/assets/images/icn_edit.png" /></a>
            &nbsp;
        <a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true) ?>" class="deleteproperty" id="<?php echo $result['id']; ?>" title="Move to trash"><img src="<?php echo BASE_URL; ?>/assets/images/icn_trash.png" /></a>
            
        </td>
       
    </tr>
    
    <?php
    ;}       
   ?>
    </tbody>
     <tfoot>
    <tr> 
        <td colspan="5">
            
        <?php 
        /*
        * Print the pagination of type
        */
        echo "Go to page ".$this->paginationControl($this->paginator,'Sliding', '/extras/dropdown_pagination.tpl.php'); ?>
        </td>
        <td><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true) ?>?add=true" title="Add new"><img src="<?php echo BASE_URL; ?>/assets/images/icn_add_user.png" /></a></td>
        
    </tr>
     </tfoot>
</table>
    </section>	
		</div><!-- end of .tab_container -->
		
</article>