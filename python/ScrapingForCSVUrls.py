import urllib.request
import pandas as pd
from bs4 import BeautifulSoup

class DatasetScraper:

    def __init__(self):
        self.data_from_transfer_payments = self.scrape_data_from_transfer_payments()

    def scrape_data_from_transfer_payments(self):
        #request the html page from "Detailed information on Transfer Payments, as per the Public Accounts of Canada"
        fp = urllib.request.urlopen("https://open.canada.ca/data/en/dataset/69bdc3eb-e919-4854-bc52-a435a3e19092")
        mybytes = fp.read()
        mystr = mybytes.decode("utf8") #decodes to utf8
        fp.close()

        #use beautifulcoup to get all the span blocks which contains the data we want
        soup = BeautifulSoup(mystr, "lxml")
        spans = soup.find_all("span",{"property":"distribution"}) #get all spans

        dictionary = dict()

        #extracts the language,name, and the url to the csv for each download
        for span in spans:
            url = span.find(attrs={"property":"url"}).text
            lang = span.find(attrs={"property":"inLanguage"}).get("content")
            name = span.find(attrs={"property":"name"}).text
            if(url.endswith(".csv")):
                dictionary[name.strip() + "(" + lang.strip() + ")"] = url

        return dictionary

    def get_CSV_from_url(self,url):
        return (pd.read_csv(url,sep=","))

    def get_names_from_datasets(self):
        return self.data_from_transfer_payments.keys()

    def get_CSV_from_name(self,name):
        return self.get_CSV_from_url(self.data_from_transfer_payments.get(name))


#test code
scraper = DatasetScraper()
print(scraper.get_CSV_from_name("2010 – Transfer Payments(en)"))