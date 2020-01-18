def csv2dlist(fileName):
    import csv
    twoDeeList = []
    with open (fileName, newline='') as testFile:
        reader = csv.reader(testFile)
        for row in reader:
            twoDeeList.append(row)
    return twoDeeList

def writeJson(inList):
    import json
    with open ('FIX', 'w') as jsonFile:
        jsonFile.write(json.dumps(inList))
    

def main():
    writeJson(csv2dlist('FIX'))

main()