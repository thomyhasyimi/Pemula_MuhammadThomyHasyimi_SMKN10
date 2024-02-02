@extends('layouts.app')
@section('content')
    <div class="topup-header">
        <h1 class="text-2xl">Withdraw</h1>
    </div>
    <div class="flex justify-between px-5">
        <h1 class="font-bold mr-5 text-2xl">Balance</h1>
        <p class="text-2xl">Rp.{{$balance}}</p>
    </div>
    <div class="topup-body mt-4">
        <form action="/withdraw/student" class="form-create flex flex-col gap-4" method="POST">
            @csrf
            <div class="form-input flex flex-col">
                <label for="debit">Amount</label>
                <input type="number" class="border border-black rounded py-2 px-4 w-full" name="debit" id="debit">
            </div>
            <div class="form-input">
                <button class="w-full bg-slate-300 hover:bg-slate-400 transition rounded py-2">Withdraw</button>
            </div>
        </form>
    </div>


@endsection