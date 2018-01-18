--TEST--
Decimal128: [decq431] negative zeros
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$canonicalBson = hex2bin('18000000136400000000000000000000000000000046B000');
$canonicalExtJson = '{"d" : {"$numberDecimal" : "-0E+3"}}';

// Canonical BSON -> Native -> Canonical BSON 
echo bin2hex(fromPHP(toPHP($canonicalBson))), "\n";

// Canonical BSON -> Canonical extJSON 
echo json_canonicalize(toCanonicalExtendedJSON($canonicalBson)), "\n";

// Canonical extJSON -> Canonical BSON 
echo bin2hex(fromJSON($canonicalExtJson)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
18000000136400000000000000000000000000000046b000
{"d":{"$numberDecimal":"-0E+3"}}
18000000136400000000000000000000000000000046b000
===DONE===