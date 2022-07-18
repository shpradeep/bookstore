<?php

namespace App\Console\Commands;

use App\Entities\Book;
use Illuminate\Console\Command;

class ProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        header('Content-Type: application/json');
		$api_key = 'uF9EwYzT9xZ5HInupmZY4En5dAivMbNRccWaaMcN';

		$request_context = stream_context_create(array(
			'http' => array(
				'header'  => "Authorization: Bearer " . $api_key
			)
		));
		$result_json = file_get_contents("https://api.packt.com/api/v1/products?token=" . $api_key);
		
		$products = json_decode($result_json, true);
		if (!empty($products['products'])) {
			foreach ($products['products'] as $product) {
				// print_r($product);exit;
				// 'title', 'slug', 'price', 'published_date', 'author_id', 'publish',
				$obj = new Book;
				$obj->title = $product['title'];
				$obj->price = '0.00';
				$obj->author_id = 1;
				$obj->published_date = $product['publication_date'];
				$obj->save();
			}
		}
    }
}
