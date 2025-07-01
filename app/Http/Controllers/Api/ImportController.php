<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ImportProductsJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
   public function import(Request $request)
{
    Log::info('Import triggered');

    if (!Storage::exists('public/products.json')) {
        Log::error('product.json file not found');
        return response()->json(['error' => 'File not found'], 404);
    }

    $json = Storage::get('/public/products.json');
    
       $decoded = json_decode($json,true);
       $products = [];
    // dd( $decoded);
     Log::info('Import triggered',['products' => $decoded]);
    // TODO: Dispatch queue job with $products
       ImportProductsJob::dispatch($decoded);
     return response()->json(['message' => 'Product import queued.',['products' => $decoded]]);
}

}
