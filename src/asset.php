<?php

/**
 * asset.php
 *
 * Asset class, Adapted from Graphene-PHP.
 *
 * @author     Valentin D'Emmanuele
 * @copyright  2016 Valentin D'Emmanuele
 * @license    Mozilla Public License Version 2.0
 * @version    1.0
 */



require_once "auto.php";

/**
 * This class is containing the functions needed to describe and manage assets.
 */
class OpenLedgerAsset
{
		public function __construct($OpenLedger){
			$this->OpenLedger = $OpenLedger;
		}
		public function InfoOf($asset){
			$array = $this->OpenLedger->API->call('InfoOf', ["asset" => $asset]);
			return $array;
		}

}
