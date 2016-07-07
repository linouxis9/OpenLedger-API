<?php

/**
 * wallet.php
 *
 * Wallet manager, Adapted from Graphene-PHP.
 *
 * @author     Valentin D'Emmanuele
 * @copyright  2016 Valentin D'Emmanuele
 * @license    Mozilla Public License Version 2.0
 * @version    1.0
 */

require_once "auto.php";

/**
 * This class is responsible of the management of the user's wallet and provides a way to explore the Bitshares' accounts.
 */
class OpenLedgerWallet
{
	public function __construct($OpenLedger){
		$this->OpenLedger = $OpenLedger;
		$this->name = $this->OpenLedger->name;
	}

	/**
	 * Returns the balance of each asset owned by $account.
	 *
	 * @param string $account
	 *
	 * @return array Returns a multidimensional array of the balances.
	 */
	public function returnBalance($account) {
		$array = $this->OpenLedger->API->call('returnBalance', ["account" => $account]);
		return $array;
	}

	/**
	 * Returns the $account history for $limit transactions.
	 *
	 * @param string $account
	 * @param int $limit The number of transactions you want from the history.
	 *
	 * @return array Returns a multidimensional array of the transactions information.
	 */
	public function ReturnAccountHistory($account, $limit = 25) {
		$array = $this->OpenLedger->API->call('ReturnAccountHistory', ["account" => $account, "limit" => $limit]);
		return $array;
	}

	/**
	 * Returns the name of an $account_id.
	 *
	 * @param string $account_id The account you want to find the name by the account id.
	 *
	 * @return string Returns the account name.
	 */
	public function GetAccountByID($account_id) {
		$array = $this->OpenLedger->API->call('GetAccountByID', ["account_id" => $account_id]);
		return $array;
	}

}
