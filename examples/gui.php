<?php

require_once "../src/auto.php";

$OpenLedger = new OpenLedger($_GET["account"]);

echo @'<head>
<link rel="stylesheet" href="panel.css">
</head>';

echo("<center>Your are ".$OpenLedger->Wallet->name."</center>");
	echo "Your balances:";
	foreach($OpenLedger->Wallet->returnBalance($OpenLedger->Wallet->name) as $asset => $balance) {
		echo "<p>".$asset." ".$balance;
		$assets = $OpenLedger->Asset;
		$assets = $assets->infoOf($asset);
		echo "<br>".$asset." has been issued by ".$assets["issuer"]." with a precision of ".(1 / $assets["precision"])."</p>";
}

echo "Last 5 TXs:";
foreach($OpenLedger->Wallet->returnAccountHistory($OpenLedger->Wallet->name, 5) as $tx) {
	echo "<p>".$tx["id"]." - ".$tx["type"]."</p>";
}

?>
