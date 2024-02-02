@extends('layouts.app')
@section('content')

    <div class="flex justify-between px-5">
        <h1 class="font-bold mr-5 text-2xl">Balance</h1>
        <p class="text-2xl">Rp.{{$balance}}</p>
    </div>
    <div class="mx-3 my-5 border-2 p-5 rounded-lg">
        <div class="grid grid-cols-4 gap-8">
            @foreach ($products as $product)
            <div class="border-black border rounded-lg ">
                <div class=" shadow-md ">
                    <img src="{{$product->photo}}" class="rounded-t-lg ">
                </div>
                <div class="gap-3 bg-slate-200 flex flex-col px-2 py-1 rounded-b-lg">
                    <h1>Name : {{$product->name}}</h1>
                    <p>Description : {{$product->name}}</p>
                    <div class="flex justify-between">
                        <div>
                            <h1>Stock : {{$product->stock}}</h1>
                        </div>
                        <div>
                            <strong>Price : Rp{{$product->price}}</strong>
                        </div>
                    </div>
                    <div class="product-body-button">
                        <form action="/cart/{{ $product->id }}" method="POST">
                            @csrf
                            <button class="px-2 py-1 bg-emerald-300 hover:bg-emerald-400 hover:shadow-lg hover:shadow-slate-400 transition rounded w-full">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection