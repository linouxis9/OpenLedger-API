<?php
/**
 * DEX.php
 *
 * DEX class, Adapted from Graphene-PHP.
 *
 * @author     Valentin D'Emmanuele
 * @copyright  2016 Valentin D'Emmanuele
 * @license    Mozilla Public License Version 2.0
 * @version    1.0
 */

require_once "auto.php";

/**
 * This class is containing some functions needed to interface with the DEX through the OL's API
 */
class OpenLedgerDEX
{

	public function __construct($OpenLedger){
		$this->OpenLedger = $OpenLedger;
	}
	
	/**
	 * Returns the order book of a [$asset_a : $asset_b] market.
	 *
	 * @param string $asset_a The base asset of the market.
	 * @param string $asset_b The quote asset of the market.
	 * @param int $limit The number of order you want from the order book. If $limit is set to 25, you will have the 25 highest bids and the 25 lowest asks.
	 *
	 * @return array Returns a multidimensional array containing the order book.
	 */
	public function returnOrderBook($asset_a, $asset_b, $limit){
		$order_book = $this->OpenLedger->API->call('returnOrderBook', ["asset_a" => $asset_a, "asset_b" => $asset_b, "limit" => $limit]);
		return $order_book;
	}

	/**
	 * Returns the ticker of an asset.
	 *
	 * @param string $asset_a The base asset of the market.
	 * @param string $asset_b The quote asset of the market.
	 *
	 * @return array Returns a multidimensional array containing a ticker of the aforementioned assets.
	 */
	public function returnTicker($asset_a, $asset_b){
		$ticker = $this->OpenLedger->API->call('returnTicker', ["asset_a" => $asset_a, "asset_b" => $asset_b]);
		return $ticker;
	}

	/**
	 * Returns the chart data of a [$asset_a : $asset_b] market.
	 *
	 * @param string $asset_a The base asset of the market.
	 * @param string $asset_b The quote asset of the market.
	 * @param int $time That's the timeframe you want. For one day, it should be 24*60*60.
	 *
	 * @return array Returns a multidimensional array containing the order book.
	 */
	public function returnChartData($asset_a, $asset_b, $time){
		$market_history = $this->OpenLedger->API->call('returnChartData', ["asset_a" => $asset_a, "asset_b" => $asset_b, "time" => $time]);
		return $market_history;
	}
}
