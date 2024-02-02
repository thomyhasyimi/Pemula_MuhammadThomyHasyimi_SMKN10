<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function products() {
        $products = Product::get();
        $transactions = Wallet::where('user_id', auth()->user()->id)->get();
        $credit = 0;
        $debit = 0;

        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }

        $balance = $credit - $debit;
        return view('student.products', compact('products', 'balance'));
    }

    public function addCart($id) {
        $product = Product::find($id);
        
        if($product->stock < 0){
            return redirect()->back()->with('status', 'Cant add the product');
        }
        Transaction::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'status' => 'pending'
        ]);
        
        $product->update([
            'stock' => $product->stock-1
        ]);


        return redirect()->back();
    }

    public function topup_get() {
        $users = User::where('role', 'student')->get();
        $transactions = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();
        $credit = 0;
        $debit = 0;
        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }
        $balance = $credit - $debit;
        return view('student.topup', compact('balance', 'users'));
    }

    public function topup_post(Request $request) {
        Wallet::create([
            'credit' => $request->credit,
            'debit' => null,
            'user_id' => auth()->user()->id,
            'status' => 'pending'
        ]);
        return redirect('/student/transactions');
    }

    public function cart_get() {
        $transactions = Wallet::where('user_id', auth()->user()->id)->get();
        $credit = 0;
        $debit = 0;
        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }
        $total_price = 0;

        $balance = $credit - $debit;
        $cart = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->get();

        foreach($cart as $item) {
            $total_price += $item->product->price;
        }

        return view('student.cart', compact('balance', 'cart', 'total_price'));
    }

    public function cart_post() {
        $transactions = Wallet::where('user_id', auth()->user()->id)->get();
        $credit = 0;
        $debit = 0;
        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }
        $balance = $credit -$debit;

        $cart = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->get();

        if(count($cart) < 1) {
            return redirect('/student/product')->with('status', 'Empty cart');
        } else {
            $total_price = 0;

            foreach($cart as $item) {
                $total_price += $item->product->price;
            }
            

            if($total_price > $balance) {
                return redirect('/student/product')->with('status', 'Insufficient balance');
            }

            else {
                Wallet::create([
                    'debit' => $total_price,
                    'credit' => null,
                    'user_id' => auth()->user()->id,
                    'status' => 'success'
                ]);

                $code = bin2hex(random_bytes(3));

                foreach($cart as $item) {
                    $item->update([
                        'status' =>'success',
                        'code' => $code,
                    ]);
                }

                return redirect("/student/cart/invoice/$code");
            }
        }

    }

    public function withdraw_get() {
        $transactions = Wallet::get();
        $users = User::where('role', 'student')->get();
        $transactions = Wallet::where('user_id', auth()->user()->id)->where('status', 'success')->get();
        $credit = 0;
        $debit = 0;
        foreach($transactions as $trans) {
            $credit += $trans->credit;
            $debit += $trans->debit;
        }
        $balance = $credit - $debit;
        return view('student.withdraw', compact('users', 'balance'));
    }

    public function withdraw_post(Request $request) {
        Wallet::create([
            'debit' => $request->debit,
            'credit' => null,
            'user_id' => auth()->user()->id,
            'status' => 'pending'
        ]);
        return redirect('/student/transactions');
    }

    public function transaction_get() {
        $wallets = Wallet::where('user_id', auth()->user()->id)->get();
        return view('student.transactions', compact('wallets'));
    }

    public function pastcart_get() {
        $transactions = collect(Transaction::where('user_id', auth()->user()->id)->where('status', 'success')->get())->sortByDesc('created_at')->groupBy('code');
        return view('student.pastorders', compact('transactions'));
    }

    public function invoice($code) {
        $users = User::all();
        $transactions = Transaction::where('user_id', auth()->user()->id)->where('code', $code)->get();
        return view('layouts.invoice', compact('transactions', 'code', 'users'));
    }

    public function destroy($id) {
        $transaction = Transaction::find($id);
        $product = Product::find($transaction->product_id);
        $product->update([
            'stock' => $transaction->product->stock + 1
        ]);
        $transaction->delete();
        return redirect()->back();
    }

    

    
}
