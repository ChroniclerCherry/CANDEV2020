'''helper functions to clean .csv data'''

def csv2dList(fileName):
    import csv
    twoDeeList = []
    with open (fileName, newline='') as testFile:
        reader = csv.reader(testFile)
        for row in reader:
            try:
                twoDeeList.append(row)
            except:
                pass
    return twoDeeList

def changeDataType(inList):
    for j in range(len(inList)):
        for x in range(len(inList[j])):
            try:
                inList[j][x] = (float(inList[j][x]))
            except:
                pass
    return inList

(changeDataType(csv2dList('C:/Users/imgoi/Desktop/Candev2020/pt-tp-2019-eng.csv')))