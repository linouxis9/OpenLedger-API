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
			$array['name'] = $asset;
			$array['asset'] = $this->OpenLedger->API->call('InfoOf', ["asset" => $asset]);
			$array['id'] = $array['asset']['id'];
			$array['precision'] = 10 ** $array['asset']['precision'];
			$array['symbol'] = $array['asset']['symbol'];
			$array['issuer'] = $array['asset']['issuer'];
			return $array;
		}

}
