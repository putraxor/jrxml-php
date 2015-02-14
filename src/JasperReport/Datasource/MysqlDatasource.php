<?php

namespace JasperReport\Datasource;

class MysqlDatasource implements DatasourceInterface
{

	private $db;

	function __construct( $host, $username, $password, $database, $port )
	{

		$this->db = @new mysqli(
			$host,
			$username,
			$password,
			$database,
			$port
        );

	}

	function execQuery( $query )
	{
		$r = $db->query( $query );

		if ( $r === false )
			throw new \Exception( "Error with query" );

		$rows = array();
		while ( $row = $r->fetch_object() )
		{
			$rows[ count( $rows )] = $row;
		}

		return $rows;
	}
	
}