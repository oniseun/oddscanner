<?php  

class EuroRates {
    private array $rates = [];
    private string $endpoint;
    private string $currency;
    private string $baseCurrency;

    public function __construct($endpoint) {
        $this->endpoint = $endpoint;
        $this->baseCurrency = 'EUR';
        $this->currency = 'EUR';
    }

    private function getRateFromSource($endpoint) : string {
        $timestamp = strtotime(time());
        $url = "$endpoint?$timestamp";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $fgetString  = @curl_exec($curl);
        curl_close($curl);

        if (!$fgetString) {
            die("Failed to get data from source URL, Please Try again\n");
        }

        return $fgetString;
    }

    public function setBaseCurrency($baseCurrency) : void {
        $this->baseCurrency = $baseCurrency;
    }

    public function setCurrency($currency) : void {
        $this->currency = $currency;
    }

    private function getConversion($currency, $rates, $rateToValueMap): array {

        $currencyValue = @$rateToValueMap[$currency];
        if (!$currencyValue) {
            die("Currency \"$currency\" does not exist in list \n"); 
        }
        $newRates = [];
        foreach($rates as $rate):
            list($rateCurrency, $currencyRate) = $rate;
            if (strtolower($rateCurrency) === strtolower($currency)) { // if same currency , replace with base currency
                $newRates[] = [$this->baseCurrency, round(1 / $currencyValue, 4)] ;
            } else {
                $newRates[] = [$rateCurrency, round($currencyRate / $currencyValue, 4)];
            }
            
        endforeach; 
        return $newRates;

    }

    public function getRates($currency = 'EUR') : array {

        $fgetString = $this->getRateFromSource($this->endpoint);
        $rateToValueMap = [];
        $rates = [];
        $this->setCurrency($currency);
        try {

            $xml = new SimpleXMLElement($fgetString);
            
            foreach($xml->Cube->Cube->Cube as $rate):
                $rateToValueMap[(string)$rate['currency']] = $rate['rate'];
                $rates[] = [$rate['currency'], $rate['rate']];
            endforeach; 

            if ($currency !== $this->baseCurrency) {
                $conversion = $this->getConversion($currency, $rates, $rateToValueMap);
                $this->rates = $conversion;
                return $conversion;
            }

            $this->rates = $rates;
            return $rates;


        } catch(Exception $e) {

            die("Invalid XML: The XMl from source is invalid");
        }
       
        
    }

    public function saveRates($filePath = null, $fileName = null) : void {

        if (!$filePath || !$fileName) {
            die("Please provide a filename or filePath with a length of 3 or more \n"); 
        }
        if (count($this->rates) < 1) {
            die("Please get Rates First \n"); 
        }

        $csvColumns = ['Currency Code', 'Rates'];

        try {

            $date = date('Y_m_d');

            $newFileName = strtolower($this->currency) . '_' . $fileName. "_$date.csv";

            $newFilePath = $filePath. '/' . $newFileName;

            $f = @fopen($newFilePath, 'w');

            if (!$f) {
                die('Error opening the file ' . $newFilePath);
            }
            $rates = [$csvColumns, ...$this->rates];
            foreach ($rates as $row):
                fputcsv($f, $row);
            endforeach;

            fclose($f);

            echo "file saved successfully as \"$newFileName\" \n";

        } catch(Exception $e) {

            die("Invalid XML: The XMl from source is invalid \n");
        }
        
    }
}
