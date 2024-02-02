@extends('layouts.app')
@section('content')
<div class="mt-5 ml-10">
    <a href="/" class="mb-10 mt-10 border-2 px-5 py-1 rounded-md hover:bg-slate-600 hover:text-white duration-700 focus:border-slate-200 outline-none">Back</a>
</div>
<div class="border-2 rounded-lg mx-10 my-10">
    <div class="">
        <form action="/product/create" method="POST">
            @csrf
                <div class="card">
                    <h1 class="font-semibold text-xl ml-5 my-10">Add Product</h1>
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="photo">Photo</label>
                    <input type="text" name="photo" id="photo" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="desc">Description</label>
                    <input type="text" name="desc" id="desc" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="category_id">Product Category</label>
                    <select class="border border-black rounded py-2 px-4 w-full" name="category_id" id="category">
                        <option value="">--SELECT AN OPTION--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="w-full flex justify-center items-center bg-slate-300 border-2 py-2 my-10 rounded-md hover:bg-slate-600 hover:text-white duration-700 focus:border-slate-200 outline-none">Tambah</button>
        </form>
</div>

@endsection