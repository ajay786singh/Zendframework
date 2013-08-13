<?php
require_once CUSTOM_PATH."/Db.php";

class Model_Calendar
{
	private $dba;
	public function __construct()
	{
		$registry = Zend_Registry::getInstance();
		$this->dba = $registry->dbAdapter;
		$this->dbStr=new DB_String;
	}	
	
	function all_calender_date($id)
	{
	 	$sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t1.property_id='".$id."'";
		$result = $this->dba->fetchAll($sql);
		return $result;
	
	}
	
	///////////////////////////////////////////////////////////////////////PEAK calender /////////////////////////////////////////////////////////////////
	function peak_calender_date($id)
	{
		$rate_type_idnti="peak";
	 $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t1.property_id='".$id."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
		return $result;
	}
	///////////////////////////////////////////////////////////////////////End PEAK calender /////////////////////////////////////////////////////////////////
	
	///////////////////////////////////////////////////////////////////////high calender /////////////////////////////////////////////////////////////////

	function high_calender_date($id)
	{
	$rate_type_idnti="high";
	 $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t1.property_id ='".$id."' AND rate_type_idnti='".$rate_type_idnti."' ";
		$result = $this->dba->fetchAll($sql);
		return $result;
	}
	
	///////////////////////////////////////////////////////////////////////End high calender /////////////////////////////////////////////////////////////////
	
	///////////////////////////////////////////////////////////////////medium calender ///////////////////////////////////////////////////////////////////////////////
	
	function medium_calender_date($id)
	{
	$rate_type_idnti="medium";
	 $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t1.property_id ='".$id."' AND rate_type_idnti='".$rate_type_idnti."' ";
		$result = $this->dba->fetchAll($sql);
		return $result;
	}
	
///////////////////////////////////////////////////////////////////End medium calender ///////////////////////////////////////////////////////////////////////////////
	
	///////////////////////////////////////////////////////////////////low calender ///////////////////////////////////////////////////////////////////////////////
	
	function low_calender_date($id)
	{
	$rate_type_idnti="low";
	 $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t1.property_id ='".$id."' AND rate_type_idnti='".$rate_type_idnti."' ";
		$result = $this->dba->fetchAll($sql);
		return $result;
	}
	
///////////////////////////////////////////////////////////////////End low calender ///////////////////////////////////////////////////////////////////////////////
	
	///////////////////////////////////////////////////////////////////special  calender ///////////////////////////////////////////////////////////////////////////////
	
	function special_calender_date($id)
	{
	  $rate_type_idnti="special";
	 $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t1.property_id='".$id."' AND rate_type_idnti='".$rate_type_idnti."' ";
		$result = $this->dba->fetchAll($sql);
		return $result;
	}
	
///////////////////////////////////////////////////////////////////End special calender ///////////////////////////////////////////////////////////////////////////////

	/////////////////////////////////////////////////////////////////////// Property Valid date fetch here for calendar////////////////////////////////////
	function validdate($id)
	{
	    $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' group by t2.property_id ";
		$result = $this->dba->fetchRow($sql);
		//////////////////// Database D-M-Y Format//////////////////////
		$from=explode("-",$result['from_date']);
		$from_date=$from[2]."-".$from[1]."-".$from[0];
		
		$to=explode("-",$result['to_date']);
		$to_date=$to[2]."-".$to[1]."-".$to[0];
		
		
		/////////////DMY Need  for day different/////////////
		$first_date = strtotime($from_date);
		$fromdate=explode("-",$from_date);
		
		$second_date = strtotime($to_date);
		$offset = $second_date-$first_date;
		$diff = ceil($offset / (60*60*24));
		////////////////////////// Day differnt end////////////////////	
		for($i=0; $i<=$diff;$i++)
{
		//////////////////////////////// MDY format for LOOP//////////////////
		@$tomorrow2 = mktime(0, 0, 0, date($fromdate[1]) , date($fromdate[0])+$i, date($fromdate[2]));
		$Holedate[]=$frmd2=date("Y-m-d",$tomorrow2);
		}
		return $Holedate;
 	
	}
		/////////////////////////////////////////////////////////////////////// Property Default date only fetch here for calendar////////////////////////////////////

function validdate_Default($id)
{
		$aviability1="No";
		$rate_type_idnti="Default";
       $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darray[$value['from_date']]="$".$value['default_rate'];

		}
	
	return $darray;		
}

/////////////////////////////////////////////////////////////////////// Property Default date only fetch here for calendar////////////////////////////////////

function validdate_Unaviability($id)
{
		$aviability1="No";
		$rate_type_idnti="Default";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darray[$value['from_date']]=0;

		}
	return $darray;		
}

function validdate_Unaviabilitycss($id)
{
		$aviability1="No";
		$rate_type_idnti="Default";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darraycss[$value['from_date']]='unaviability';

		}
	return $darraycss;		
}
/////////////////////////////////////////////////////////////////////// End  Property Default date only fetch here for calendar////////////////////////////////////

/////////////////////////////////////////////////////////////////////// PEAK Property Default date only fetch here for calendar////////////////////////////////////

function validdate_Peak($id)
{
		$aviability1="No";
		$rate_type_idnti="peak";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darray[$value['from_date']]="$".$value['peak_rate'];

		}
	return $darray;		
}

function validdate_Peakcss($id)
{
		$aviability1="No";
		$rate_type_idnti="peak";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darraycss[$value['from_date']]='peak';

		}
	return $darraycss;		
}
/////////////////////////////////////////////////////////////////////// End  Property Default date only fetch here for calendar////////////////////////////////////	

/////////////////////////////////////////////////////////////////////// HIGH SEASON Property Default date only fetch here for calendar////////////////////////////////////

function validdate_High($id)
{
		$aviability1="No";
		$rate_type_idnti="high";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darray[$value['from_date']]="$".$value['high_rate'];

		}
	return $darray;		
}

function validdate_Highcss($id)
{
		$aviability1="No";
		$rate_type_idnti="high";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darraycss[$value['from_date']]='high';

		}
	return $darraycss;		
}
/////////////////////////////////////////////////////////////////////// End  Property Default date only fetch here for calendar////////////////////////////////////	

/////////////////////////////////////////////////////////////////////// MEDIUM SEASON Property Default date only fetch here for calendar////////////////////////////////////

function validdate_Medium($id)
{
		$aviability1="No";
		$rate_type_idnti="medium";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darray[$value['from_date']]="$".$value['medium_rate'];

		}
	return $darray;		
}

function validdate_Mediumcss($id)
{
		$aviability1="No";
		$rate_type_idnti="medium";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darraycss[$value['from_date']]='medium';

		}
	return $darraycss;		
}
/////////////////////////////////////////////////////////////////////// End  Property Default date only fetch here for calendar////////////////////////////////////	


/////////////////////////////////////////////////////////////////////// LOW SEASON Property Default date only fetch here for calendar////////////////////////////////////

function validdate_Low($id)
{
		$aviability1="No";
		$rate_type_idnti="low";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darray[$value['from_date']]="$".$value['low_rate'];

		}
	return $darray;		
}

function validdate_Lowcss($id)
{
		$aviability1="No";
		$rate_type_idnti="low";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darraycss[$value['from_date']]='low';

		}
	return $darraycss;		
}
/////////////////////////////////////////////////////////////////////// End  Property Default date only fetch here for calendar////////////////////////////////////	

/////////////////////////////////////////////////////////////////////// SPECIAL SEASON Property Default date only fetch here for calendar////////////////////////////////////

function validdate_Special($id)
{
		$aviability1="No";
		$rate_type_idnti="special";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darray[$value['from_date']]="$".$value['sp_event_rate'];

		}
		
	return $darray;		
}

function validdate_Specialcss($id)
{
		$aviability1="No";
		$rate_type_idnti="special";
        $sql="select  t1.*, t2.* from property_ragister t1 join pre_rate t2 on t1.property_id=t2.property_id where t2.property_id='".$id."' AND t2.aviability!='".$aviability1."' AND rate_type_idnti='".$rate_type_idnti."'";
		$result = $this->dba->fetchAll($sql);
	foreach($result as $value)
		{
		$darraycss[$value['from_date']]='special';

		}
	return $darraycss;		
}
/////////////////////////////////////////////////////////////////////// End  Property Default date only fetch here for calendar////////////////////////////////////	

/////////////////////////////////////////////// Paypal Authorization code/////////////////////////////////////////

	// or 'beta-sandbox' or 'live'

/**
 * Send HTTP POST Request
 *
 * @param	string	The API method name
 * @param	string	The POST Message fields in &name=value pair format
 * @return	array	Parsed HTTP Response body
 */
function PPHttpPost($methodName_, $nvpStr_) {
	$environment="sandbox";

	// Set up your API credentials, PayPal end point, and API version.
	$API_UserName = urlencode('sat71_1293101555_biz_api1.yahoo.com');
	$API_Password = urlencode('1293101568');
	$API_Signature = urlencode('AXw9eyvPO-rhsf9vLR6d-7cRU83UAsyxAMFuvvY3vLSedHpmImiA2Gyu');
	//$API_Endpoint = "https://api-3t.paypal.com/nvp";
	$API_Endpoint ="https://api-3t.sandbox.paypal.com/nvp";
	/*if("sandbox" === $environment || "beta-sandbox" === $environment) {
		$API_Endpoint ="https://api-3t.sandbox.paypal.com/nvp";
	}*/
	$version = urlencode('51.0');

	// Set the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	// Turn off the server and peer verification (TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);

	


	// Set the API operation, version, and API signature in the request.
	//$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature";
   $nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";


	// Set the request as a POST FIELD for curl.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	// Get response from the server.
	$httpResponse = curl_exec($ch);
/*   print_r($httpResponse);

die;
*/	
if(!$httpResponse) {
		exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
	}

	// Extract the response details.
	$httpResponseAr = explode("&", $httpResponse);

	$httpParsedResponseAr = array();
	foreach ($httpResponseAr as $i => $value) {
		$tmpAr = explode("=", $value);
		if(sizeof($tmpAr) > 1) {
			$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
		}
	}

	if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
		exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
	}

	return $httpParsedResponseAr;
}

/////////////////////////////////////////////////// End here //////////////////////////////

}