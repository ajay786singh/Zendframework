<?php     
require_once CUSTOM_PATH."/Db.php";

class Model_Upload

{

  private $dba;
	

    public function __construct()

    {

    $registry = Zend_Registry::getInstance();

    $this->dba = $registry->dbAdapter;//Zend_Db::factory($configuration->database);

    $this->dbStr=new DB_String;



    }	
function set_directory($dir_name,$dir_name1)
	{	 $this->directory_name = $dir_name;
		$this->directory_name1 = $dir_name1;
		
		} 
	function set_max_size($max_file =3000000)	
	{	 $this->max_filesize = $max_file;	
	} 	function error()	{	
	return $this->error;	
	} 	
	function is_ok()	
	{	 if(isset($this->error))	 
	return FALSE;	 else	  return TRUE;	}	
	function set_tmp_name($temp_name)	{  
	$this->user_tmp_name = $temp_name;	 	}	
	function set_file_size($file_size)	{	
	$this->user_file_size = $file_size;	}	
	function set_file_type($file_type)	{	
	$this->user_file_type = $file_type;	 	} 
	function set_file_name($file)	{	
	$this->user_file_name = $file;	
	$this->user_full_name = $this->directory_name."/".$this->user_file_name;	
	}	
	function resize($max_width = 0, $max_height = 0 )	
	{	
	if(eregi("\.png$",$this->user_full_name))	
	{	 $img = ImageCreateFromPNG ($this->user_full_name);	
	}		
	if(eregi("\.(jpg|jpeg)$",$this->user_full_name))	
	{
	 $img = ImageCreateFromJPEG ($this->user_full_name);
	}		if(eregi("\.gif$",$this->user_full_name))	{	 
	$img = ImageCreateFromGif ($this->user_full_name);	}   
 	$FullImage_width = imagesx ($img); 
	$FullImage_height = imagesy ($img);   		
	if(isset($max_width) && isset($max_height) && $max_width != 0 && $max_height != 0)	
	{	
	$new_width = $max_width;	
	$new_height = $max_height;
	}		
	else if(isset($max_width) && $max_width != 0)	
	{		 $new_width = $max_width;		
	$new_height = ((int)($new_width * $FullImage_height) / $FullImage_width);	
	}		else if(isset($max_height) && $max_height != 0)		
	{		 $new_height = $max_height;		
	$new_width = ((int)($new_height * $FullImage_width) / $FullImage_height);		}	
	else		{		 $new_height = $FullImage_height;		
	$new_width = $FullImage_width;	
	}	    	
	$full_id =  ImageCreateTrueColor ( $new_width , $new_height );		
	ImageCopyResampled ( $full_id, $img, 0,0,0,0, $new_width, $new_height, $FullImage_width, $FullImage_height );
	if(eregi("\.(jpg|jpeg)$",$this->user_full_name))		
	{		 $full = ImageJPEG( $full_id, $this->user_full_name,100);		}				
	if(eregi("\.png$",$this->user_full_name))	
	{		 $full = ImagePNG( $full_id, $this->user_full_name);		
	}				if(eregi("\.gif$",$this->user_full_name))		
	{		 $full = ImageGIF($full_id, $this->user_full_name);		
	}						ImageDestroy( $full_id );	
	unset($max_width);		
	unset($max_height);	}	
	function start_copy()	
	{		if(!isset($this->user_file_name))	
	$this->error = "You must define filename!";     
	if ($this->user_file_size <= 0)	
	$this->error = "File size error (0): $this->user_file_size KB<br>";      
	if ($this->user_file_size > $this->max_filesize)		
	$this->error = "File size error (1): $this->user_file_size KB<br>";        
	if (!isset($this->error))        {			
	$filename = basename($this->user_file_name);           
	if (!empty($this->directory_name)) 			
	$destination = $this->user_full_name;		
	else 				$destination = $filename;	
	if(!is_uploaded_file($this->user_tmp_name))		
	$this->error = "File ".$this->user_tmp_name." is not uploaded correctly.";		
	if (!@copy($this->user_tmp_name,$destination))			
	$this->error = "Impossible to copy ".$this->user_file_name." from $userfile to destination directory - ".
   $destination."";	
	}	return $filename;	}
	
	function set_thumbnail_name($thumbname)
	{
	if(eregi("\.png$",$this->user_full_name))	
	$this->thumb_name = $this->directory_name1."/".$thumbname;	
	
	if(eregi("\.(jpg|jpeg)$",$this->user_full_name))	 
	$this->thumb_name = $this->directory_name1."/".$thumbname;	
	
	if(eregi("\.gif$",$this->user_full_name))	
	$this->thumb_name = $this->directory_name1."/".$thumbname;	}	
	
	function create_thumbnail()	
	{	
	if (!copy($this->user_full_name, $this->thumb_name))	 
	{	  echo "<br>".$this->user_full_name.", ".$this->thumb_name."<br>";	
	echo "failed to copy $file...<br />\n";	  }	}	
	function set_thumbnail_size($max_width = 0, $max_height = 0 )	
	{	if(eregi("\.png$",$this->thumb_name))	{
	$img = ImageCreateFromPNG ($this->thumb_name);	}		
	if(eregi("\.(jpg|jpeg)$",$this->thumb_name))	{	
	$img = ImageCreateFromJPEG ($this->thumb_name);	}		
	if(eregi("\.gif$",$this->thumb_name))	{	
	$img = ImageCreateFromGif ($this->thumb_name);	}    	
	$FullImage_width = imagesx ($img);        
	$FullImage_height = imagesy ($img); 				
	if(isset($max_width) && isset($max_height) && $max_width != 0 && $max_height != 0)		
	{		 $new_width = $max_width;		 $new_height = $max_height;		}
	else if(isset($max_width) && $max_width != 0)		{		
	$new_width = $max_width;		
	$new_height = ((int)($new_width * $FullImage_height) / $FullImage_width);		}	
	else if(isset($max_height) && $max_height != 0)	
	{		 $new_height = $max_height;		
	$new_width = ((int)($new_height * $FullImage_width) / $FullImage_height);	
	}				else		{		 $new_height = $FullImage_height;		
	$new_width = $FullImage_width;		}	    
	$full_id =  ImageCreateTrueColor ( $new_width , $new_height );		
	ImageCopyResampled ( $full_id, $img, 0,0,0,0, $new_width, $new_height, $FullImage_width, $FullImage_height 
);				if(eregi("\.(jpg|jpeg)$",$this->thumb_name))		{		 $full = ImageJPEG( $full_id, $this->
thumb_name,100);		}				if(eregi("\.png$",$this->thumb_name))		{		 $full = ImagePNG( 
$full_id, $this->thumb_name);		}				if(eregi("\.gif$",$this->thumb_name))		{		 $full = 
ImageGIF($full_id, $this->thumb_name);		}		ImageDestroy( $full_id );		unset($max_width);		unset(
$max_height);	}}
?>
