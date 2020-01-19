import urllib.request
import pandas as pd
from bs4 import BeautifulSoup

def GetSCVFromDetailedInformationOnTransferPayments()
    #request the html page from "Detailed information on Transfer Payments, as per the Public Accounts of Canada"
    fp = urllib.request.urlopen("https://open.canada.ca/data/en/dataset/69bdc3eb-e919-4854-bc52-a435a3e19092")
    mybytes = fp.read()
    mystr = mybytes.decode("utf8") #decodes to utf8
    fp.close()

    #use beautifulcoup to get all the span blocks which contains the data we want
    soup = BeautifulSoup(mystr, "lxml")
    spans = soup.find_all("span",{"property":"distribution"}) #get all spans

    #extracts the language,name, and the url to the csv for each download
    for span in spans:
        lang = span.find(attrs={"property":"inLanguage"}).get("content")
        name = span.find(attrs={"property":"name"}).text
        url = span.find(attrs={"property":"url"}).text
        print(lang)
        print(name)
        print(url)