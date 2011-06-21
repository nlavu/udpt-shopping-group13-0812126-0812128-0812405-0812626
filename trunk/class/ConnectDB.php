<?php

/** 
 * @author Thu Ha
 * 
 * 
 */
class ConnectDB {
	//TODO - Insert your code here
	public static $mHost = "localhost";
	public static $mLoginName = "root";
	public static $mPassword = "";
	public static $mDBName = "shopping_here";
	protected static $mLink;
	
	/**
	 * ConnectDB constructor
	 *
	 * @param 
	 */
	function ConnectDB() 
	{
	}
	
	public static function OpenConnection() 
	{
		ConnectDB::$mLink = @mysql_connect(ConnectDB::$mHost, ConnectDB::$mLoginName, ConnectDB::$mPassword);//ConnectDB::$mHost, ConnectDB::$mLoginName, ConnectDB::$mPassword);
		if (!ConnectDB::$mLink) return false;
		mysql_query("set names 'utf8'", ConnectDB::$mLink);
		if (!@mysql_select_db(ConnectDB::$mDBName, ConnectDB::$mLink)) return false;
		return true;
	}
	
	public static function CloseConnection() 
	{
		mysql_close(ConnectDB::$mLink);
	}

}

?>