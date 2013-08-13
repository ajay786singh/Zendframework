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
                    
<table class="zebra" id="example"> 
     <thead>
    <tr> 
        <th><input type="checkbox" name="selectall" class="checkall" /></th>
        <th>Property Image</th>
        <th>Property Name</th>
        <th>Landlord Name</th>
        <th>Property Location</th>
        <th>Action</th>
        
    </tr>
     </thead>
     <tbody>
    <?php 
    if(count($results)>0)
    {
        foreach($results as $result)
        {
        $image=explode(",",$result['image_url']);
      
     ?>
   
    <tr> 
        <td><input type="checkbox" class="case"  name="users" value="<?php echo $result['id']; ?>" /></td>
        <td>
            <?php if($image[0]){
               $url=BASE_URL."/uploads/images/".$image[0];
               
            }
            else{
                $url=BASE_URL."/assets/images/noimages.jpg";
                }
                echo "<img src='{$url}' width='80' height='60' />"; 
                ?>
           
        </td>
        <td><?php echo $result['title']; ?></td>
        <td><?php echo $result['firstname']." ".$result['lastname']; ?></td>
        <td><?php echo $result['location_id']; ?></td>
        <td><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=edit&pid=<?php echo $result['id'];?>&edit=overview" title="Edit"><img src="<?php echo BASE_URL; ?>/assets/images/icn_edit.png" /></a>
            &nbsp;
        <a href="javascript:void(0);" class="deleteproperty" id="<?php echo $result['id'];?>" title="Move to trash"><img src="<?php echo BASE_URL; ?>/assets/images/icn_trash.png" /></a>
            
        </td>
       
    </tr>
    
    <?php
        } 
    }
    else
    {
   ?>
    <tr>
        <td colspan="6">No Property..</td>
    </tr>
    <?php } ?>
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
        <td><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=new" title="Add new"><img src="<?php echo BASE_URL; ?>/assets/images/add.gif" /></a></td>
        
    </tr>
     </tfoot>
</table>
    </section>	
		</div><!-- end of .tab_container -->
		
</article>