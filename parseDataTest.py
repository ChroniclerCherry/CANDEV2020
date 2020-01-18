#1st Draft of useful functions
'''takes a csv file and turns it to a 2d list'''
def csv2dlist(fileName):
    import csv
    twoDeeList = []
    with open (fileName, newline='') as testFile:
        reader = csv.reader(testFile)
        for row in reader:
            twoDeeList.append(row)
    return twoDeeList

'''Sorts a 2d list by a key index
not sure if this works'''
def sort2d(list,key):
    #sort the list by known index
    #using timSort
    sortedList = sorted(list,key = lambda row: row[key])

'''Looks to see if serachTerm is in the list, puts it to a new list.'''
def filterList(list, key):
    outputList = []
    for _ in range(len(list)):
        if key in list[_]:
            outputList.append(list[_])
    return outputList

'''quick sort, by hand'''
def quickSort(inList,key):
    import random
    if len(inList) == 0 or len(inList) == 1:
        return inList
    
    pivot = inList.pop(random.randint(0,(len(inList))))
    lList = []; rList = []

    for _ in inList:
        if _ <= pivot:
            lList.append(_)
        else:
            rList.append(_)

    return quickSort(lList,key)+[pivot]+quickSort(rList,key)