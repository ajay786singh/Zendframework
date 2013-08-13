<?php $pdetails=$this->pdetails;
$edit=$_REQUEST['edit'];
$users=$this->users;
?>
<style>
    .zebra thead th a.active{ text-decoration: underline; font-size: 15px; color: black;}
    .edit-container{ margin: 10px;}
    #canvas {
    width: 100%;
    height: 400px;
}
</style>
<article class="module_content">

    <h1>Property Name: <?php echo $pdetails['title'];?> </h1>

</article>

<article class="module width_3_quarter">
    
    <div class="tab_container" >
        
    <section style="min-height:200px;">
        <table class="zebra">
            <thead>
                <tr>
                    <th><a <?php if($edit=='overview') { echo "class=active"; }?> href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=edit&pid=<?php echo $pdetails['id'];?>&edit=overview">Overview</a></th>
                    <th><a <?php if($edit=='images') { echo "class=active"; }?> href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=edit&pid=<?php echo $pdetails['id'];?>&edit=images">Images</a></th>
                    <th><a <?php if($edit=='pricing') { echo "class=active"; }?> href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=edit&pid=<?php echo $pdetails['id'];?>&edit=pricing">Pricing</a></th>
                    <th><a <?php if($edit=='availability') { echo "class=active"; }?> href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=edit&pid=<?php echo $pdetails['id'];?>&edit=availability">Availability</a></th>
                    <th><a <?php if($edit=='map') { echo "class=active"; }?> href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'manageproperty'), null, true) ?>?action=edit&pid=<?php echo $pdetails['id'];?>&edit=map">Map</a></th>
                </tr>
            </thead>
        </table>
       
        
        <div class="edit-container">
            <?php if($edit=='overview'){ ?>
            <form class="form" method="post" action="<?php echo $this->url(array('controller' => 'admin', 'action' => 'addproperty'), null, true); ?>">
         <input type="hidden" name="mode" value="add">
         <input type="hidden" name="created_on" value="<?php echo date('Y-m-d H:i:s') ?>">
            <dl>
                <dt><label for="landlord_id">Landlord*:</label></dt>
                
                <dd>
                    <select name="landlord_id" class="validate[required]" style="width: 175px;">
                        <?php foreach($users as $user){ ?>
                        <option <?php if($user['id']==$pdetails['landlord_id']){ echo "selected";}?> value="<?php echo $user['id'];?>"><?php echo $user['username'].' &lt;'.$user['email']."&gt;";?></option>
                        <?php } ?>
                    </select>
                </dd>
                
                <dt><label for="Title">Title*:</label></dt>
            
                <dd><input name="title" id="title" class="validate[required]" type="text" value="<?php echo $pdetails['title'];?>"></dd>
            
                <dt><label for="Summary">Summary*:</label> </dt>
            
                <dd><input name="summary" id="summary" type="text" value="<?php echo $pdetails['summary'];?>" class="validate[required]" /> </dd>
                
                <dt><label for="Location">Location*:</label> </dt>
            
                <dd><input name="location_id" id="location_id" type="text" value="<?php echo $pdetails['title'];?>" class="validate[required]" /> </dd>
                <dt><label for="Property Status">Property Status</label></dt>
                <dd><select name="status">
                        <option <?php if($pdetails['status']=='0'){ echo "selected";}?> value="0">Inactive</option>
                        <option <?php if($pdetails['status']=='1'){ echo "selected";}?> value="1">Active</option>
                    </select></dd>      
                <dt class="button">&nbsp;</dt>
                
                <dd class="button"><input type="submit" class="button" value="Submit"></dd>
            </dl>

        </form>
            <?php } ?>
            <?php if($edit=='images'){ ?>
            <?php
            /**************************************
             * 
             *  Function to upload property images
             * 
             **************************************/
            ?>
                <?php echo $this->partial('addimage.tpl.php', array('data'=>$this->data));?>
            <?php
            /**************************************
             * 
             *  Function to upload property images
             * 
             **************************************/ 
             ?>
            
            <?php } ?>
            <?php if($edit=='pricing'){ ?>
            <form>

              <?php echo $edit;?> 

            </form>
            <?php } ?>
            <?php if($edit=='availability'){ ?>
            <form>

              <?php echo $edit;?> 

            </form>
            <?php } ?>
            <?php if($edit=='map'){ ?>
            <form method="post">
                <label for="address">Enter address:</label>
                <input type="text" name="address" id="address" value="<?php echo $_POST['address'];?>"/>
                <input type="submit" name="points" id="points" value="get location" />
            </form>
            <br />
            <div id="canvas"></div>
	<br />
        <form method="post">
	<label for="latitude">Latitude:</label>
	<input id="latitude" type="text" value="" />
	<label for="longitude">Longitude:</label>
	<input id="longitude" type="text" value="" />
            <input type="submit" name="submit" value="Submit Location" />
        </form>
        
    <script type="text/javascript">
        $().ready(function() {
        
            
            
            $('#points').click(function(){
                var user1Location = $('#address').val();
                var defaultLat=0;
                var defaultLng =0;
                var geocoder = new google.maps.Geocoder();
                //convert location into longitude and latitude
                geocoder.geocode({
                address: user1Location
                 }, function(locResult) {
                console.log(locResult);
                defaultLat = locResult[0].geometry.location.lat();
                defaultLng = locResult[0].geometry.location.lng();
                alert(defaultLng);
                //createmap(defaultLat,defaultLng);
                });
            });
            
            
        });
    function createmap(defaultLat,defaultLng)
    {
            var myZoom = 12;
            var myMarkerIsDraggable = true;
            var myCoordsLenght = 6;
            var map = new google.maps.Map(document.getElementById('canvas'), {
            zoom: myZoom,
            center: new google.maps.LatLng(defaultLat, defaultLng),
            mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            // creates a draggable marker to the given coords
            var myMarker = new google.maps.Marker({
            position: new google.maps.LatLng(defaultLat, defaultLng),
            draggable: myMarkerIsDraggable
            });
            // adds a listener to the marker
            // gets the coords when drag event ends
            // then updates the input with the new coords
            google.maps.event.addListener(myMarker, 'dragend', function(evt){
            document.getElementById('latitude').value = evt.latLng.lat().toFixed(myCoordsLenght);
            document.getElementById('longitude').value = evt.latLng.lng().toFixed(myCoordsLenght);
            });
            // centers the map on markers coords
            map.setCenter(myMarker.position);
            // adds the marker on the map
            myMarker.setMap(map);
    }
    
    </script>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
            <?php } ?>

        </div>
         <!-- Map Part Ends -->
         
        
    </section>	
    </div><!-- end of .tab_container -->
		
</article>    