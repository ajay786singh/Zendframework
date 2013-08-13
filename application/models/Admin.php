<?php
require_once CUSTOM_PATH."/Db.php";
class Model_Admin
{
	private $dba;
        protected $_table;
	public function __construct()
	{
		$registry = Zend_Registry::getInstance();
		$this->dba = $registry->dbAdapter;
		$this->dbStr=new DB_String;
	}
        
       	
    function getTable()
    { 

        if (null === $this->_table) {

            require_once APPLICATION_PATH . '/models/DbTable/Standard.php';

            $this->_table = new Model_DbTable_Standard(array('name' => 'users'));

        }

        return $this->_table;

    }
    
    function insert($table,$data)
    { 

    $this->dba->insert($table,$data);

    return $this->dba->lastInsertId();
    }    
    function save(array $data)
    {

    $table  = $this->getTable();

    $fields = $table->info(Zend_Db_Table_Abstract::COLS);

    foreach ($data as $field => $value) {

    if (!in_array($field, $fields)) {

    unset($data[$field]);
    }
    else{

    $data[$field]=addslashes($data[$field]);
    }

    } 

    return $table->insert($data);

    }
    function CheckExist($tbl,$arr, $con='and', $op='=')
    {
    $wh=$this->dbStr->setQuery($arr,$con,$op);
    $result=$this->dba->fetchRow("select * from $tbl where $wh");
    if($result)
    return $result;
    else 
    return false; 
    }
   
    public function getAllUsers($where="")
    { 
		$sql = "SELECT * FROM users $where  order by id desc";
		$result = $this->dba->fetchAll($sql);
		return $result;
    }
    
    public function getTotalUsers()
    { 
		$sql = "SELECT count(*) as num FROM users";
		$result = $this->dba->fetchRow($sql);
		return $result;
    }
   
    public function getUser($id)
    { 
        $sql = "SELECT * FROM users where id=".$id;
        $result = $this->dba->fetchRow($sql);
        return $result;
    }
    function saveusers($data)
    { 

    $this->save($data);

    $last_in_id=$this->dba->lastInsertId();

    return true;

    }
    
    function updateuser($data,$uid)

	{
             $rs=$this->dba->update('users',$data,"id =$uid");

		if($rs){
		return $rs;

		}

		else {

		return false;

                }   
        }
        
    function deleteuser($uid)
    {
        $sql="delete from users where id='$uid'";

	$this->dba->query($sql);

    }

    function getMedia()
    {
        $sql = "SELECT * FROM media order by id desc";
        $result = $this->dba->fetchAll($sql);
        return $result;

    }
    function getProperty($where)
    {        
        $sql = "select A.*, B.property_id,B.image_url, C.firstname,C.lastname from property A left join property_image B on A.id = B.property_id Join users C where A.landlord_id=C.id order by A.id DESC";
        $result = $this->dba->fetchAll($sql);
        return $result;
    }
    
    function addProperty($data)
    {
        
        $table="property";
        $result=$this->dba->insert($table,$data);

        return $this->dba->lastInsertId();
    }
    function getPropertyDetail($pid)
    {        
        $sql = "select A.*, B.property_id,B.image_url, C.firstname,C.lastname from property A left join property_image B on A.id = B.property_id Join users C where A.id=$pid and  A.landlord_id=C.id order by A.id DESC";
        $result = $this->dba->fetchrow($sql);
        return $result;
    }
}