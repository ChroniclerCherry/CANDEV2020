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

        #use beautifulSoup to get all the span blocks which contains the data we want
        soup = BeautifulSoup(mystr, "lxml")
        spans = soup.find_all("span",{"property":"distribution"}) #get all spans

        #the data is returned as a dictionary with the name of the file + language as the key
        #and the url to the csv file as the value
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

    #For now we only deal with the valid data that's in english
    def get_valid_years_english(self):
        for data in self.data_from_transfer_payments.keys():
            if (int)(data.split(" ")[0]) >= 2010 and ("(en)" in data):
                yield data

    def get_valid_CSV(self):
        for data in self.get_valid_years_english():
            yield self.get_CSV_from_name(data)

    def get_CSV_from_name(self,name):
        return self.get_CSV_from_url(self.data_from_transfer_payments.get(name))

#test code
scraper = DatasetScraper()
#returns all CSVs with the valid english datasets
for data in scraper.get_valid_CSV():
    print(data)