<?php $results=$this->paginator;
    $count=$this->count;
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
        <th class="check-column"><input type="checkbox" name="selectall" class="checkall" /></th>
        <th></th>
        <th>File</th>
        <th class="column-date">Date</th>        
    </tr>
     </thead>
     <tbody>
    <?php 
    if($count>0)
    {
        foreach($results as $result)
        { 
    ?>
         
    <tr> 
        <td><input type="checkbox" name="users" class="case"  value="<?php echo $result['id']; ?>" /></td>
        <td class="column-icon media-icon">
            <a href="http://wordpress.thesst.com/clients/agricom/wp-admin/media.php?attachment_id=1142&amp;action=edit" title="Edit “bpa”">
                <img width="60" height="60" src="http://wordpress.thesst.com/clients/agricom/wp-content/uploads/2012/05/bpa1-150x150.jpg" class="attachment-80x60" alt="bpa" title="bpa">
            </a>
        </td>
        <td><?php echo $result['username']; ?></td>
        <td><?php echo $result['create_date']; ?></td>
        
       
    </tr>
    <?php
       }
   }
 else {
     ?>
     <tr> 
        <td colspan="4" align="center" class="error">No records</td>
    </tr>
    <?php 
    }
    ?>
    </tbody>
     <tfoot>
    <tr> 
        <td colspan="3">
            
        <?php 
        if($count>0){
        /*
        * Print the pagination of type
        */
        echo "Go to page ".$this->paginationControl($this->paginator,'Sliding', '/extras/dropdown_pagination.tpl.php');
        }
        ?>
        </td>
        <td><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true) ?>?add=true" title="Add new"><img src="<?php echo BASE_URL; ?>/assets/images/icn_add_user.png" /></a></td>
        
    </tr>
     </tfoot>
</table>
    </section>	
		</div><!-- end of .tab_container -->
		
</article>