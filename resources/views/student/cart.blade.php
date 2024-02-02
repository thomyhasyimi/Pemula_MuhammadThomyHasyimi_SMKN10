@extends('layouts.app')
@section('content')

<div class="cart-header">
    <h1 class="text-2xl">Cart Products</h1>
</div>

<div class="flex justify-between px-5">
    <h1 class="font-bold mr-5 text-2xl">Balance</h1>
    <p class="text-2xl">Rp.{{$balance}}</p>
</div>
<div class="mx-3 my-5 border-2 p-5 rounded-lg">
    <div class="">
        @foreach ($cart as $item)
        <div class="flex  flex-row justify-between border-2 rounded-lg">
            <div>
                <img src="{{$item->product->photo}}" class="w-[150px] h-auto rounded-lg">
            </div>
            <div class="w-full pl-3 flex flex-col gap-3 py-3">
                <p>Name : {{$item->product->name}}</p>
                <p>Description : <span class="text-slate-500">{{$item->product->desc}}</span></p>
                <p>Stock: {{$item->product->stock}}</p>
            </div>
            <div class="flex justify-center items-center mx-3 border-l-2 pl-6">
                <h1 class="text-center">Rp{{$item->product->price}}</h1>
            </div>
            <div class="flex justify-center items-center mx-3 border-l-2 pl-6">
                <form method="POST" action="/student/cart/{{ $item->id }}/delete">
                    @csrf
                    <button class="px-4 py-2 rounded bg-red-400 hover:bg-red-500">&#9746;</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="card-foot w-full flex items-end flex-col justify-end my-4">
    <p class="text-xl">Total Price: <span class="font-black">Rp{{ $total_price }}</span></p>
</div>

<form action="/student/cart" method="POST">
    @csrf
    <button class="w-full bg-slate-300 hover:bg-slate-400 transition rounded py-2 px-4">Pay now</button>
</form>


@endsection