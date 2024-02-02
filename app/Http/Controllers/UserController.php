<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!auth()->user()) {
            return view('login');
        }
        if(auth()->user()->role == 'admin') return view('admin.home');
        if(auth()->user()->role == 'bank') return view('bank.home');
        if(auth()->user()->role == 'shop') return view('shop.home');
        if(auth()->user()->role == 'student') return view('student.home');

        return view('login');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function showUser()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        
        return view('admin.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::find($id)->update($request->all());
        return redirect ('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('status', "Berhasil Dihapus");
    }
    
    public function logout() {
        Session::flush();
        return redirect('/');
    }


    public function login(Request $request) {
        $user = User::where('name', $request->name)->first();
        if(!$user || $request->password != $user->password) {
            return redirect()->back()->with('status', 'Login failed');
        }
        
        Auth::login($user);
        
        return redirect()->back();
    }


    public function transactions() {
        $transactions = collect(Transaction::get())->sortByDesc('created_at')->groupBy('code');
        return view('admin.transactions', compact('transactions'));
    }

    public function invoice($code) {
        $users = User::all();
        $transactions = Transaction::where('code', $code)->get();
        return view('layouts.invoice', compact('transactions', 'code'));
    }

    public function history_transactions() {
        $wallets = Wallet::get();
        return view('admin.historytrans', compact('wallets'));
    }
}
