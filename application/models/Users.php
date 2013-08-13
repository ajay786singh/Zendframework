<?php      
 require_once CUSTOM_PATH."/Db.php";

class Model_Users

{

	private $dba;

	protected $_table;

	public function __construct()

	{

		$registry = Zend_Registry::getInstance();

		$this->dba = $registry->dbAdapter;//Zend_Db::factory($configuration->database);

		$this->dbStr=new DB_String;

		$this->Mail = new Zend_Mail();

	}	
function getTable()

    { 

        if (null === $this->_table) {

            require_once APPLICATION_PATH . '/models/DbTable/Standard.php';

            $this->_table = new Model_DbTable_Standard(array('name' => 'users'));

        }

        return $this->_table;

    }
 
     function getUser($tbl, $arr)

    { 

		$sql = "SELECT * FROM $tbl where ".$this->dbStr->setQuery($arr);

		$result = $this->dba->fetchAll($sql);

		return $result;

    }

function getAllUsers()
 { 
    $sql = "SELECT * FROM users";
    $result = $this->dba->fetchAll($sql);
    return $result;
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

    function update(array $data, $where)

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

	 function select($sql)

	{	

		return $this->dba->fetchAll($sql);

	}

	 function selectone($sql)

	{	

		return $this->dba->fetchRow($sql);

	}

	

    function saveusers($data)
    { 

    $this->save($data);

    $last_in_id=$this->dba->lastInsertId();

    return true;

    }



}


