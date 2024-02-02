<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('shop.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('shop.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('shop.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        if(!$product) {
            return redirect()->back();
        }
        $product->delete();
        return redirect()->back();
    }  
    
    public function transactions() {
        $transactions = collect(Transaction::get())->sortByDesc('created_at')->groupBy('code');
        return view('shop.transactions', compact('transactions'));
    }

    public function invoice($code) {
        $users = User::all();
        $transactions = Transaction::where('code', $code)->get();
        return view('layouts.invoice', compact('transactions', 'code'));
    }

    public function history_transactions() {
        $wallets = Wallet::get();
        return view('shop.historytrans', compact('wallets'));
    }
    public function history_products() {
        $transaction = Transaction::with('product', 'user')->where('status', 'success')->get();
        return view('shop.historytrans', compact('transaction'));
    }

    public function pending_get() {
        $status = ['success', 'taken'];
        $pendings = Transaction::with('product', 'user')->whereIn('status', $status)->get();
        return view('shop.pendings', compact('pendings', 'status'));
    }

    public function pending_post($id) {
        $pending = Transaction::find($id);
        if(!$pending) return redirect()->back();
        $pending->update(['status' => 'taken']);
        return redirect('/pending');
    }

}
