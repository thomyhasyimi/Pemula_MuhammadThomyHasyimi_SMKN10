@extends('layouts.app')
@section('content')

<div class="transaction-head mb-4">
    <h1 class="text-2xl">Transaction</h1>
</div>
<div class="transaction-body">
    <table class="border w-full">
        <thead>
            <tr class="border">
                <th class="border border-black px-4 py-2">ID</th>
                <th class="border border-black px-4 py-2">User</th>
                <th class="border border-black px-4 py-2">Product</th>
                <th class="border border-black px-4 py-2">Status</th>
                <th class="border border-black px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendings as $pending)
                <tr class="border border-black">
                    <td class="border p-2 text-center border-black">{{ $pending->id }}</td>
                    <td class="border p-2 text-center border-black">{{ $pending->user->name }}</td>
                    
                    <td class="border p-2 text-center border-black">{{ $pending->product->name}}</td>
                    <td class="border p-2 text-center border-black">{{ $pending->status}}</td>
                    
                    <td class="border p-2 text-center border-black">
                        @if($pending->status == 'taken')
                        <span>Confirmed</span>
                        @else
                        <div class="buttons flex gap-2 justify-center w-full">
                            <form action="/pending/{{ $pending->id }}" method="POST">
                                @method('PUT')
                                @csrf
                                <button class="bg-green-300 hover:bg-green-400 py-2 px-4 rounded transition">Accept</button>
                            </form>
                        </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection