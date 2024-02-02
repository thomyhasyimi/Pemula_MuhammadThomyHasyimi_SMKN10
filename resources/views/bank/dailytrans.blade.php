@extends('layouts.app')
@section('content')
<div class="pastcart-head mb-4">
    <h1 class="text-2xl">Daily Transactions</h1>
</div>

<div class="pastorders-body">
    @foreach($transactions as $code => $transactionGroup)
            <div class="border border-slate-400 rounded p-4 mb-4">
                @php
                    $transac = $transactionGroup[0];
                @endphp
                <h3 class="text-lg font-bold mb-2 hover:text-slate-600 transition">Transactions</h3>
                <p class="">by {{ $transac ->user->name}}</p>
                <p class="">{{ $transac->created_at }}</p>
                <ul class="list-none p-0 m-0">
                    @php
                        $totalPrice = 0;
                    @endphp

                    @foreach ($wallets as $wallet)
                    <li class="border-b py-2">
                        <strong class="font-semibold">Name:</strong> {{ $wallet->user->name }}<br>
                        @if ($wallet->credit)
                            
                        <strong class="font-semibold">Credit:</strong> Rp{{ $wallet->credit }}<br>
                        @else
                        <strong class="font-semibold">Debit:</strong> Rp{{ $wallet->debit }}<br>
                            
                        @endif
                    </li>
                    @endforeach

                    
                </ul>

                
            </div>
        @endforeach
</div>


@endsection