<?php

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
    	// dit is een test comment voor git
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
        ]);

		DB::table('products')->insert([
			['article_id' => 1,'id' => 1234567891234,'size' => 'XS','stock' => 6],
			['article_id' => 1,'id' => 1234567891235,'size' => 'S','stock' => 9],
			['article_id' => 1,'id' => 1234567891236,'size' => 'M','stock' => 10],
			['article_id' => 1,'id' => 1234567891237,'size' => 'L','stock' => 10],
			['article_id' => 1,'id' => 1234567891238,'size' => 'XL','stock' => 6],
			['article_id' => 2,'id' => 2234567891234,'size' => 'XS','stock' => 9],
			['article_id' => 2,'id' => 2234567891235,'size' => 'S','stock' => 9],
			['article_id' => 2,'id' => 2234567891236,'size' => 'M','stock' => 8],
			['article_id' => 2,'id' => 2234567891237,'size' => 'L','stock' => 3],
			['article_id' => 2,'id' => 2234567891238,'size' => 'XL','stock' => 7],
			['article_id' => 3,'id' => 3234567891234,'size' => 'XS','stock' => 2],
			['article_id' => 3,'id' => 3234567891235,'size' => 'S','stock' => 2],
			['article_id' => 3,'id' => 3234567891236,'size' => 'M','stock' => 2],
			['article_id' => 3,'id' => 3234567891237,'size' => 'L','stock' => 7],
			['article_id' => 3,'id' => 3234567891238,'size' => 'XL','stock' => 10],
			['article_id' => 4,'id' => 4234567891234,'size' => 'XS','stock' => 10],
			['article_id' => 4,'id' => 4234567891235,'size' => 'S','stock' => 8],
			['article_id' => 4,'id' => 4234567891236,'size' => 'M','stock' => 2],
			['article_id' => 4,'id' => 4234567891237,'size' => 'L','stock' => 10],
			['article_id' => 4,'id' => 4234567891238,'size' => 'XL','stock' => 8],
			['article_id' => 5,'id' => 5234567891234,'size' => 'XS','stock' => 5],
			['article_id' => 5,'id' => 5234567891235,'size' => 'S','stock' => 3],
			['article_id' => 5,'id' => 5234567891236,'size' => 'M','stock' => 6],
			['article_id' => 5,'id' => 5234567891237,'size' => 'L','stock' => 10],
			['article_id' => 5,'id' => 5234567891238,'size' => 'XL','stock' => 7],

		]);
		DB::table('racks')->insert([
			['id' => 1, 'description' => 'test rek']
		]);
Rack::find(1)->products()->attach(1234567891237);
Rack::find(1)->products()->attach(5234567891237);
Rack::find(1)->products()->attach(2234567891237);

        }
    }
    