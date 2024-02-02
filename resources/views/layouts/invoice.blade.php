<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>window.print()</script>
</head>
<body>
    <div class="app w-full flex-col h-screen flex justify-center items-center">
        <a href="/">Back</a>
        <div class="border border-slate-400 rounded p-4 mb-4 min-w-[25rem]">
            <h3 class="text-lg font-bold mb-2">TNS_{{ $code }}</h3>
            

            @foreach ($transactions as $transaction)
                
                @if($transaction->count() == 0)
                    <p class="">by <span class="font-bold">{{ $transaction->user->name }}</span></p>
                    <p class="">{{ $transactions->created_at }}</p>
                    {{-- @else
                    <p class="">by <span class="font-bold">{{ $transaction[0]->user->name }}</span></p>
                    <p class="">{{ $transaction[0]->created_at }}</p> --}}
                    @endif
            @endforeach

            <ul class="list-none p-0 m-0">
                @php
                    $totalPrice = 0;
                @endphp

                <strong>by: <span class="font-bold">{{ $transaction->user->name }}</span></strong><br>
                @foreach($transactions as $trans)
                    <li class="border-b py-2">
                        <strong class="font-semibold">Product:</strong> {{ $trans->product->name }}<br>
                        <strong class="font-semibold">Price:</strong> Rp{{ $trans->product->price }}<br>
                        <strong class="font-semibold">Status:</strong> {{ $trans->status }}<br>
                        <strong class="font-semibold">Order At:</strong> {{ $trans->created_at }}<br>
                    </li>

                    @php
                        $totalPrice += $trans->product->price;
                    @endphp
                @endforeach
            </ul>
            <div class="mt-2">
                <strong class="font-semibold">Total Price: Rp{{ $totalPrice }}</strong>
            </div>
        </div>
    </div>
</body>
</html>