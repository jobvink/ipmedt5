#  sales / pickups / tries
# ['date' => Carbon::parse('2017-03-03 00:00:00'),'barcode' => 123],
# met de funcie get_random_entry krijg je random entry tussen de data: 2016-1-1 01:00:00' en '2017-12-31 01:00:00'
# in combinatie met de barcodes uit de set barcodes

import random
import time

barcodes = ['\'1234567891234\'', '\'1234567891235\'', '\'1234567891236\'', '\'1234567891237\'', '\'1234567891238\'',
            '\'2234567891234\'', '\'2234567891235\'', '\'2234567891236\'', '\'2234567891237\'', '\'2234567891238\'',
            '\'3234567891234\'', '\'3234567891235\'', '\'3234567891236\'', '\'3234567891237\'', '\'3234567891238\'',
            '\'4234567891234\'', '\'4234567891235\'', '\'4234567891236\'', '\'4234567891237\'', '\'4234567891238\'',
            '\'5234567891234\'', '\'5234567891235\'', '\'5234567891236\'', '\'5234567891237\'', '\'5234567891238\''] # set met barcodes

sizes = ['XS', 'S', 'M', 'L', 'XL']

# geeft een random entry op in de sales / pickups / tries database te stoppen
def get_random_enrty():
    return "['created_at' => %s,'product_id' => %s],\n" % (get_rendom_carbon_date('2016-1-1 01:00:00','2017-7-31 01:00:00'), get_random_barcode(barcodes))

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

def get_products_entry(id, barcode, size):
    return "\t\t\t['article_id' => %i,'id' => %s,'size' => '%s','stock' => %i],\n" % (id, barcode, size, random.randint(1, 10))

def get_racks_entry():
    return "\t\t\t['id' => 1, 'description' => 'test rek']"

def seround_with_create(table_name, content):
    create_table = ''
    create_table += "\t\tDB::table('%s')->insert([\n" % table_name
    for s in content:
        create_table += s
    create_table += "\n\t\t]);\n"
    return create_table

def main():
    database_seeder = open('DatabaseSeeder.php', 'w')

    database_seeder.write("""<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Rack;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('articles')->insert([
            [
                'id'=>1,
                'name'=>'wit shirt',
                'description'=>'Een simple witte shirt.',
            ],
            [
                'id'=>2,
                'name'=>'Trui',
                'description'=>'Een blauwe warme trui.',
            ],
            [
                'id'=>3,
                'name'=>'rood shirt',
                'description'=>'Een simple roode shirt.',
            ],
            [
                'id'=>4,
                'name'=>'Vest',
                'description'=>'Een mooie warme hoodie',
            ],
            [
                'id'=>5,
                'name'=>'groen shirt',
                'description'=>'Een simple groene shirt',
            ],
        ]);\n\n""")

    products = []
    for i in range(len(barcodes)):
        products.append(get_products_entry(i//5+1, barcodes[i], sizes[i%len(sizes)]))

    database_seeder.write(seround_with_create('products',products))

    database_seeder.write(seround_with_create('racks', get_racks_entry()))


    database_seeder.write("Rack::find(1)->products()->attach(%s);\n" % get_random_barcode(barcodes))
    database_seeder.write("Rack::find(1)->products()->attach(%s);\n" % get_random_barcode(barcodes))
    database_seeder.write("Rack::find(1)->products()->attach(%s);\n" % get_random_barcode(barcodes))


    # sales = []
    # for i in range(1000):
    #     sales.append("\t\t\t" + get_random_enrty())
    # database_seeder.write(seround_with_create('sales', sales))
    #
    pickups = []
    for i in range(1000):
        pickups.append("\t\t\t" + get_random_enrty())
    database_seeder.write(seround_with_create('pickups', pickups))
    #
    # tries = []
    # for i in range(1000):
    #     tries.append("\t\t\t" + get_random_enrty())
    # database_seeder.write(seround_with_create('tries', tries))

    database_seeder.write("""
        }
    }
    """)

if __name__ == '__main__':
    main()