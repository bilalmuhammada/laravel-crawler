<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
class ImportProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected  $productsData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $productsData)
    
    {
        

        $this->productsData = $productsData;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
     public function handle()
    {
        
        foreach ($this->productsData as $item) {
            // Ensure object is converted to array
            $item = (array) $item;

            $price = floatval(str_replace(['€', ','], ['', '.'], $item['price'] ?? '0'));

            $product = Product::updateOrCreate(
                ['title' => $item['title']],
                [
                    'price' => $price,
                    'description' => $item['description'] ?? null,
                    'category' => $item['category'] ?? null,
                ]
            );

            // Delete old images
            $product->images()->delete();

            // Support multiple or single image_url
            $images = is_array($item['image_url']) ? $item['image_url'] : [$item['image_url']];

            foreach ($images as $url) {
                if (!empty($url)) {
                    $product->images()->create(['url' => $url]);
                }
            }
        }

        \log::info('Import complete.');
    }
}
