<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details'); //variabel data untuk disimpan di transaction table
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);

        $transaction = Transaction::create($data); //menyimpan data transaksi

        foreach ($request->transaction_details as $product) {
            //membuat array untuk detail transaksi
            $details[] = new TransactionDetail([
                'transaction_id' => $transaction->id,
                'product_id' => $product,
            ]);

            //mengurangi stok
            Product::find($product)->decrement('quantity');
        }

        //menyimpan data relasinya
        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}
