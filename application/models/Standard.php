<?php
require_once CUSTOM_PATH."/Db.php";
class Model_Standard
{
	private $dba;
    protected $_table;
	private $Table_Name; 
	public function __construct($table)
	{
		$this->Table_Name=$table;
		$registry = Zend_Registry::getInstance();
		$this->dba = $registry->dbAdapter;
		$this->dbStr=new DB_String;
	}	

  public function getTable()
    { 
        if (null === $this->_table) {
            require_once APPLICATION_PATH . '/models/DbTable/Standard.php';
            $this->_table = new Model_DbTable_Standard(array('name' => Table_Prefix.$this->Table_Name));
        }
        return $this->_table;
    }

  public function save(array $data)
    {
        $table  = $this->getTable();
        $fields = $table->info(Zend_Db_Table_Abstract::COLS);
        foreach ($data as $field => $value) {
            if (!in_array($field, $fields)) {
                unset($data[$field]);
            }
			else
			$data[$field]=addslashes($data[$field]);
        }
        return $table->insert($data);
    }
	
    public function update(array $data, $where)
    {
        $table  = $this->getTable();
        $fields = $table->info(Zend_Db_Table_Abstract::COLS);
        foreach ($data as $field => $value) {
            if (!in_array($field, $fields)) {
                unset($data[$field]);
        }
        }
		$TableName = $table->info(Zend_Db_Table_Abstract::NAME);
		return $this->dba->update($TableName, $data, $where);
    }

    public function fetchEntries()
    {
    	return $this->getTable()->fetchAll('1');
    }
	public function select($sql)
	{	
		return $this->dba->fetchAll($sql);
	}
	public function selectone($sql)
	{	
		return $this->dba->fetchRow($sql);
	}

    public function fetchEntry($wh)
    {
        $table = $this->getTable();
        $select = $table->select()->where($wh);
        return $table->fetchRow($select)->toArray();
    }
	public function query($sql)
	{	
		return $this->dba->query($sql);
	}
	public function insert($table,$data)
    { 
		$this->dba->insert($table,$data);
    }
	public function CheckExist($tbl,$arr, $con='and', $op='=')
	{
		$wh=$this->dbStr->setQuery($arr,$con,$op);
		$result=$this->dba->fetchRow("select * from $tbl where $wh");
		if($result)
			return $result;
		else 
			return false; 
	}
	
	public function multiDelete($tbl,$data,$col)
	{	
		$query = "delete from $tbl where $col in (".implode(',',$data).")";
		$this->dba->query($query);
	}
	public function resize($filename, $savepath, $width=250,$height=250)
	{
		list($width_orig, $height_orig, $type) = getimagesize($filename);
		if($width_orig>$width || $height_orig>$height)
		{
			if ($width && ($width_orig < $height_orig))
			{
				   $width = ($height / $height_orig) * $width_orig;
			}
			else
			{
				   $height = ($width / $width_orig) * $height_orig;
			}
		}
		else
		{
			$width=$width_orig;
			$height=$height_orig;
		}
		// Resample
		$image_p = imagecreatetruecolor($width, $height);
		if($type==2)
		{
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			imagejpeg($image_p, $savepath , 100);
		}
		elseif($type==3)
		{
			$image = imagecreatefrompng($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			imagepng($image_p, $savepath , 100);
		}
		elseif($type==1)
		{
			$image = imagecreatefromgif($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			imagegif($image_p, $savepath , 100);
		}
		elseif($type)
		{
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			imagejpeg($image_p, $savepath , 100);
		}
	}
	public function uploadImage($FILE_SRC, $targetdir, $type='',$height='', $width='', $targetfile='',$maxsize='')
	{
		  if($FILE_SRC['name']!='')
		  {
		  	 $file=$FILE_SRC['name'];
			 $dest_file=$targetdir.'/'.$file;
			if(move_uploaded_file($FILE_SRC['tmp_name'], $dest_file))
			{	
				if($height!='' && $width!='')
				{
			   		$this->resize($dest_file, $dest_file, $height, $width);
				}
			   return $file;
			}
		 }
		 else 
		  return false;
	}		
}