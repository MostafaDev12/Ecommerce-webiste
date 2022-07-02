<?php

 
 return array(
     
'client_id'=>'AX6Ag95-C0i59GygknqZfCU5V4ymB6jhuXXKHT3gvaKwtcsA7frmMAsqe1-52X6Zx_Z_sxrZDy2Gi5pF',
'secret' => 'EK-vDOPE83RIYm_Ki-SSXy2U4iKLJ3t7AM9CzBP918unK2SmUHWfBWgjG2M69LNlNHImkOLXyALsmbV6',
/**
* SDK configuration 
*/
'settings' => array(
	/**
	* Available option 'sandbox' or 'live'
	*/
	'mode' => 'live',
	/**
	* Specify the max request time in seconds
	*/
	'http.ConnectionTimeOut' => 1000,
	/**
	* Whether want to log to a file
	*/
	'log.LogEnabled' => true,
	/**
	* Specify the file that want to write on
	*/
	'log.FileName' => storage_path() . '/logs/paypal.log',
	/**
	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	*
	* Logging is most verbose in the 'FINE' level and decreases as you
	* proceed towards ERROR
	*/
	'log.LogLevel' => 'FINE'
	),

);