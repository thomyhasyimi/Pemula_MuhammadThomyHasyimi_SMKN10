@extends('layouts.app')
@section('content')

<div class="transaction-head mb-4">
    <h1 class="text-2xl">History Transactions</h1>
</div>
<div class="transaction-body">
    <table class="border w-full">
        <thead>
            <tr class="border">
                <th class="border border-black px-4 py-2">ID</th>
                <th class="border border-black px-4 py-2">User</th>
                <th class="border border-black px-4 py-2">Credit</th>
                <th class="border border-black px-4 py-2">Debit</th>
                <th class="border border-black px-4 py-2">Status</th>
                <th class="border border-black px-4 py-2">Time</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($wallets as $wallet)
                <tr class="border border-black hover:bg-indigo-200">
                    <td class="border p-2 text-center border-black">{{ $wallet->id }}</td>
                    <td class="border p-2 text-center border-black">{{ $wallet->user->name }}</td>
                    <td class="border p-2 text-center border-black">
                        @if ($wallet->credit)
                            {{ $wallet->credit }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="border p-2 text-center border-black">
                        @if ($wallet->debit)
                            {{ $wallet->debit }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="border p-2 text-center border-black">
                        {{ $wallet->status }}
                    </td>
                    <td class="border p-2 text-center border-black">
                        @if ($wallet->created_at)
                            {{ $wallet->created_at }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection