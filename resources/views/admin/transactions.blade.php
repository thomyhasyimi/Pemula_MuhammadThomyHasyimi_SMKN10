@extends('layouts.app')
@section('content')
<div class="pastcart-head mb-4">
    <h1 class="text-2xl">Transactions</h1>
</div>

<div class="pastorders-body">
    @foreach($transactions as $code => $transactionGroup)
            <div class="border border-slate-400 rounded p-4 mb-4">
                @php
                    $transac = $transactionGroup[0];
                @endphp
                <a href="{{ "/user/invoice/$code" }}">
                    <h3 class="text-lg font-bold mb-2 hover:text-slate-600 transition">TNS_{{ $code }}</h3>
                </a>
                <p class="">by {{ $transac ->user->name}}</p>
                <p class="">{{ $transac->created_at }}</p>
                <ul class="list-none p-0 m-0">
                    @php
                        $totalPrice = 0;
                    @endphp

                    @foreach($transactionGroup as $transaction)
                        <li class="border-b py-2">
                            <strong class="font-semibold">Product:</strong> {{ $transaction->product->name }}<br>
                            <strong class="font-semibold">Price:</strong> Rp{{ $transaction->product->price }}<br>
                        </li>

                        @php
                            $totalPrice += $transaction->product->price;
                        @endphp
                    @endforeach
                </ul>

                <div class="mt-2">
                    <strong class="font-semibold">Total Price: {{ $totalPrice }}</strong>
                </div>
            </div>
        @endforeach
</div>


@endsection