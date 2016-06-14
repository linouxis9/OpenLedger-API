<?php

/**
 * JsonCall.php
 *
 * JSON-RPC, Adapted from Graphene-PHP.
 *
 * @author     Valentin D'Emmanuele
 * @copyright  2016 Valentin D'Emmanuele
 * @license    Mozilla Public License Version 2.0
 * @version    1.0
 */

require_once "auto.php";

/**
 * This class is handling the communication with the the server through curl. In most cases, this class should not be directly used by an user.
 */
class OpenLedgerJsonRPC
{
	public function __construct($url) {
		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'GraphenePHP/1.0');
		curl_setopt($this->curl, CURLOPT_URL,$url);
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
	}
	
	public function __destruct() {
		curl_close($this->curl);
	}
	
	public function execute($method, $params) {
		$params["function"] = $method;
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);
		return curl_exec($this->curl);
	}
}