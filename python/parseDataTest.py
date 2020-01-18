#1st Draft of useful functions
'''takes a csv file and turns it to a 2d list'''
def csv2dlist(fileName):
    import csv
    twoDeeList = []
    with open (fileName, newline='') as testFile:
        reader = csv.reader(testFile)
        for row in reader:
            twoDeeList.append(row)

'''Sorts a 2d list by a key index
not sure if this works'''
def sort2d(list,key):
    #sort the list by known index
    #using timSort
    sortedList = sorted(list,key = lambda row: row[key])
    print (sort2d)

'''Looks to see if serachTerm is in the list, puts it to a new list.'''
def filterList(list, key):
    outputList = []
    for _ in range(len(list)):
        if key in list[_]:
            outputList.append(list[_])
    return outputList