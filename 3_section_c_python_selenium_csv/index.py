
from euroBtcModule import EuroBTC

url  = "https://finance.yahoo.com/quote/BTC-EUR/history/"
days = 10
csvFileName = 'eur_btc_rates'

euroBtc = EuroBTC(url)
euroBtc.getRates(days)
euroBtc.saveRates(csvFileName)