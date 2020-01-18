

def parseCSV(fileName):
    import csv
    twoDeeList = []
    with open (fileName, newline='') as testFile:
        reader = csv.reader(testFile)
        for row in reader:
            twoDeeList.append(row)