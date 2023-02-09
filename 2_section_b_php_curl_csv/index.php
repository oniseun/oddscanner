<?php  

/**
 * Get today’s currency rates based in EUR from the ECB and save them on a CSV file, named
 * “usd_currency_rates_{date}, with two columns - “Currency Code” and “Rate” - based in USD.
 */
require ("lib/euro-rates.php");

define('SOURCE_URL', 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
define('CSV_OUTPUT_FOLDER', 'csv_output');
define('PATH', substr(dirname(__FILE__), strlen($_SERVER['DOCUMENT_ROOT'])) . '/' . CSV_OUTPUT_FOLDER);

$eRates = new EuroRates(SOURCE_URL);

$currency = 'USD';

$fileName = 'currency_rates';

$rates = $eRates->getRates($currency);

// print_r($rates);

$eRates->saveRates(PATH, $fileName);