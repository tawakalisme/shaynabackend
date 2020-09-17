<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6); //membatasi pengambilan data
        $product_name = $request->input('product_name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $product = Product::with('galleries')->find($id);

            if ($product) {
                return ResponseFormatter::success($product, 'Data Produk Berhasi diambil');
            } else {
                return ResponseFormatter::error($product, 'Data Produk Tidak Ada', 404);
            }
        }


        if ($slug) {
            $product = Product::with('galleries')->where('slug', $slug)->first();

            if ($product) {
                return ResponseFormatter::success($product, 'Data Produk Berhasi diambil');
            } else {
                return ResponseFormatter::error($product, 'Data Produk Tidak Ada', 404);
            }
        }

        $product = Product::with('galleries');

        if ($product_name) {
            $product->where('product_name', 'like', '%' . $product_name . '%');
        }
        if ($type) {
            $product->where('type', 'like', '%' . $type . '%');
        }
        if ($price_from) {
            $product->where('price', '>=', $price_from);
        }
        if ($price_to) {
            $product->where('price', '<=', $price_to);
        }

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data List Produk Berhasil Diambil'
        );
    }
}
