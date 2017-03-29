#  sales / pickups / tries
# ['date' = > Carbon::parse('2017-03-03 00:00:00'),'barcode' = > 123],
# met de funcie get_random_entry krijg je random entry tussen de data: 2016-1-1 01:00:00' en '2017-12-31 01:00:00'
# in combinatie met de barcodes uit de set barcodes

import random
import time

barcodes = [1234567891234, 1234567891235, 1234567891236,
            2234567891234, 2234567891235, 2234567891236,
            3234567891234, 3234567891235, 3234567891236,
            4234567891234, 4234567891235, 4234567891236,
            5234567891234, 5234567891235, 5234567891236,
            1231425363543, 1231425363543, 1231425363543] # set met barcodes

# geeft een random entry op in de sales / pickups / tries database te stoppen
def get_random_enrty():
    return "['date' => %s,'barcode' => '%s']," % (get_rendom_carbon_date('2016-1-1 01:00:00','2017-12-31 01:00:00'), get_random_barcode(barcodes))

# returnt een random barcode uit de set barcodes die gegeven moet worden
def get_random_barcode(barcodes):
    return barcodes[random.randint(0,len(barcodes)-1)]

# geeft een random datum terug
def strTimeProp(start, end, format, prop):
    start_time = time.mktime(time.strptime(start, format))
    end_time = time.mktime(time.strptime(end, format))
    ptime = start_time + prop * (end_time - start_time)
    return time.strftime(format, time.localtime(ptime))

#zorgt er voor dat de functie strTimeProp het goede format terug geeft
def randomDate(start, end, prop):
    return strTimeProp(start, end, '%Y-%m-%d %I:%M:%S', prop)

# neemt een random date en maakt er een Carbon::Parse formaat van
def get_rendom_carbon_date(begin, end):
    return 'Carbon::parse(\'%s\')' % randomDate(begin, end,random.random())

def main():
    file = open('pickups.txt', 'w')

    for i in range(1000):
        file.write(get_random_enrty())
        file.write('\n')
        # print(get_random_enrty())


if __name__ == '__main__':
    main()