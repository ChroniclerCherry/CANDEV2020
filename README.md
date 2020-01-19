# CANDEV2020

## The python folder
DatasetScraper.py contains a class that can be used to get SCV download links from websites, and then load those CSVs from a variety of possible filter options. Given more time, it can be expanded to any websites where data can be retrieved from a public domain, making updating datasets easy and automated.

Currently it works to retrieve all csv files from [Detailed information on Transfer Payments, as per the Public Accounts of Canada](https://open.canada.ca/data/en/dataset/69bdc3eb-e919-4854-bc52-a435a3e19092) and takes an easily workable subset of the data for the purposes of demoing. The data used are all the english records from 2010 to the present, concatenated together to create one large csv file ready to be imported to the database.

Datavisualization.py demonstrates one way to immediately work with the data, doing some basic cleaning and filtering to create a dynamic [interactable graph](https://github.com/ChroniclerCherry/CANDEV2020/blob/master/DepartmentPaymentPerFiscalYear.html) using the plotly library.

## Database design
[CreateTransferDepartment.sql](https://github.com/ChroniclerCherry/CANDEV2020/blob/master/CreateTransferDepartment.sql) is an sql script used to create the table for the dataset used in this demonstration.

## The Web Files folder

The html/css/javascript/php for the web portion of this demo is found in the Web Files folder. Currently the demo only pulls from a single database table, but is easily scalable to multiple tables with many datasets. From the website, users can directly manipulate and play with the data in a visual way through search filters and selections

Data visualization is not fully dynamic yet due to time constraints, but much of the code to do so has been implemented already
