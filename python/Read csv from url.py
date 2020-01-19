import csv
import pandas as pd

url="http://donnees-data.tpsgc-pwgsc.gc.ca/ba1/pt-tp/pt-tp-2019-eng.csv"

data = pd.read_csv(url,sep=",") # use sep="," for coma separation. 
print(data)