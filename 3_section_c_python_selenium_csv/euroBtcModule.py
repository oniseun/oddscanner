
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import os

class EuroBTC:
    def __init__(self, url):
        self.url = url
        self.rates = []

    def getRates(self, days):
        op = webdriver.ChromeOptions()
        op.add_argument('headless')
        driver = webdriver.Chrome(options=op)
        print('Opening url "' + self.url +'"..')
        driver.get(self.url)
        print('done! \nclicking on "Accept All"..')
        agreeButton = WebDriverWait(driver, 10).until(
                EC.presence_of_element_located((By.CSS_SELECTOR, 'button[name="agree"]'))
            ).click()
        print('done! \nclicking on "Maybe Later"..')
        maybeLaterButton = WebDriverWait(driver, 10).until(
                EC.presence_of_element_located(("xpath", "//button[text()='Maybe later']"))
            ).click()

        print('done! \ngetting data from table rows..')
        tableRows = driver.find_elements(By.CSS_SELECTOR, 'table[data-test="historical-prices"] tbody tr')

        rates = []
        adjustedDays = min(days, len(tableRows))
        for x in range(adjustedDays):
            row = tableRows[x]   
            cols = row.find_elements(By.TAG_NAME, "td") 
            date, close = cols[0].text, cols[4].text 
            rates.append([date, close])

        driver.close()
        self.rates = rates
        print('EUR/BTC Rates fetched successfully from ' + rates[adjustedDays - 1][0] + ' to ' + rates[0][0])

    def saveRates(self, csvFileName):
        import os

        path = os.path.dirname(__file__)
        fullPath = path + '/csv_output/' + csvFileName + '.csv'
        print('saving to file..')
        with open(fullPath, 'w') as f:    
            f.write(f'Date,BTC Closing Value\n')
            for x in self.rates:
                date, close = x
                f.write(f'"{date}","{close}"\n')
            
            print('EUR/BTC rates saved successfully in '+ fullPath)

