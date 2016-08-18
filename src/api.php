<?php

/**
 * api.php
 *
 * API manager, Adapted from Graphene-PHP.
 *
 * @author     Valentin D'Emmanuele
 * @copyright  2016 Valentin D'Emmanuele
 * @license    Mozilla Public License Version 2.0
 * @version    1.0
 */

require_once "auto.php";

/**
 * This class is responsible of handling the results of the calls made to server. In most cases, this class should not be directly used by an user.
 */
class OpenLedgerAPI
{
	public function __construct($address){
		$this->curl = new OpenLedgerJsonRPC($address);
		$this->allowed_methods = array("returnOrderBook", "returnChartData", "returnTicker", "returnBalance", "returnAccountHistory", "getAccountByID", "infoOf");
	}
	
	public function call($call, $params=array()) {
		if (in_array($call, $this->allowed_methods))
			{
			return json_decode($this->curl->execute($call, $params), true)['result'];
			}
        return 0;
	}
}
