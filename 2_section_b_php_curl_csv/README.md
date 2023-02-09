# Section B ՞ PHP ֡ CURL ֡ CSV




## Author

- [@oniseun](https://www.github.com/oniseun)


## Question

Get today’s currency rates based in EUR from the ECB and save them on a CSV file, named
“usd_currency_rates_{date}, with two columns - “Currency Code” and “Rate” - based in USD.


## Answer
Inside the index.php file:

1) change the $currency variable to the currency you want to convert to on line 11. In this case USD

```bash
  $currency = 'USD';
```

2) change the $filename variable on line 17 to the filename you want to save as (without .csv extension and date) 

```bash
  $filename = 'currency_rates';
```
  
3) Run

```bash
  php index.php
```

4) check the /csv_output folder for the generated csv rates

```bash
  /csv_output/usd_currency_rates_2023_02_09.csv
```
