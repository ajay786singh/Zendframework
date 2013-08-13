<!-- The outter table to contain the form and the instruction panel --> 
<form action="<?php echo $this->url(array('controller' => 'user', 'action' => 'register'), null, true) ?>" name="regform" id="regform" method="post">
    
    
    <table width="650px" border="0" cellpadding="2px" cellspacing="1px" bgcolor="#FFCC66">
        <tr bgcolor="#FFFFDD">
            <td width="2px" bgcolor="#FFCC66"></td>
            <td width="400px">
                <div class="formHeading">Registration Form</div>
                <!-- The inner table below is a container for form -->              
                <table width="100%" border="0" cellpadding="3px" class="htmlForm" cellspacing="0">
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                     <tr>
                        <td align="left">User Name</td>
                        <td width="220px"><input type="text" size="32" name="username" class="validate[required,custom[onlyLetterNumber],maxSize[20]]" /></td>
                    </tr>
                    <tr>
                        <td align="left">First Name</td>
                        <td width="220px"><input type="text" size="32" name="firstname" class="validate[required]" /></td>
                    </tr>
                    <tr>
                        <td align="left">Last Name</td>
                        <td><input type="text" size="32" name="lastname" /></td>
                    </tr>
                    <tr>
                        <td align="left">Email</td>
                        <td><input type="text" size="32" name="email" class="validate[required, custom[email]]" /></td>
                    </tr>
                    <tr>
                        <td align="left">Password</td>
                        <td><input type="text" size="32" name="password" class="validate[required]"  /></td>
                    </tr>                   
                    <tr>
                        <td align="left">City</td>
                        <td><input type="text" size="32" name="city" /></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                                                                                                        
                </table>
            </td>
            <td valign="top">
                <ul class="points">
                    
                    <?php if($this->msg){ ?><li><?php echo $this->msg; ?></li><?php } ?>
                    
                </ul>
            </td>
        </tr>
        <tr bgcolor="#FFCC66">
            <td>&nbsp;</td>
            <td colspan="2">
                <input type="submit" value="Save" />
                <!--<input type="button" value="Cancel" />-->
            </td>
        </tr>
        
    </table>
</form>    