# Section C ՞ Python ֡ Selenium ֡ CSV




## Author

- [@oniseun](https://www.github.com/oniseun)


## Question

Get specific data - “Date” and “Close” - for the past 10 days from Yahoo Finance and save it
on a CSV file, named “eur_btc_rates.csv”, with two columns - “Date” and “BTC Closing Value”.


## Answer
Inside the index.py file:

1) change the days variable to the number of days you want to fetch on line 5. In this case 10

```bash
  days = 10
```

2) change the csvFileName variable on line 6 to the filename you want to save as (without .csv extension ) 

```bash
  csvFileName = 'eur_btc_rates'
```
  
3) Run

```bash
  python3 index.py
```

4) check the /csv_output folder for the generated csv rates

```bash
  /csv_output/eur_btc_rates.csv
```
