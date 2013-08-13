<?php $count=$this->count;?>
<article class="module width_3_quarter">
    <table>
        <tr>
            <td><span class="add_field">+</span></td>
            <td><span class="remove_field">-</span></td>
        </tr>
    </table>
    
    
 
<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="pid" value="<?php $_REQUEST['pid'];?>" />
    <div class="input_holder">
        <input type="file" name="uploaded_files[]" id="input_clone"/>
        <?php
            if($count>1){
                for($i=1;$i<$count;$i++)
                {
                echo '<input type="file" name="uploaded_files[]"/>';
                }
        }?>
    </div>
    <input type="submit" value="upload_files" />
</form>
</article>
<script type="text/javascript">
 
        $('.add_field').click(function(){
     
            var input = $('#input_clone');
            var clone = input.clone(true);
            clone.removeAttr ('id');
            clone.val('');
            clone.appendTo('.input_holder'); 
         
        });
 
        $('.remove_field').click(function(){
         
            if($('.input_holder input:last-child').attr('id') != 'input_clone'){
                  $('.input_holder input:last-child').remove();
            }
         
        });
 
</script>