@extends('layouts.app')
@section('content')
<div class="mt-5 ml-10">
    <a href="/" class="mb-10 mt-10 border-2 px-5 py-1 rounded-md hover:bg-slate-600 hover:text-white duration-700 focus:border-slate-200 outline-none">Kembali</a>
</div>
<div class="border-2 rounded-lg mx-10 my-10">
    <div class="">
        <form action="/user/edit/{{$users->id}}" method="POST">
            @method('PUT')
            @csrf
                <div class="card">
                    <h1 class="font-semibold text-xl ml-5 my-10">Edit User</h1>
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{$users->name}}" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="{{$users->password}}" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="role">User Category</label>
                    <input type="text" name="role" id="role" value="{{$users->role}}" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
            </div>
            <button type="submit" class="w-full flex justify-center items-center bg-slate-300 border-2 py-2 my-10 rounded-md hover:bg-slate-600 hover:text-white duration-700 focus:border-slate-200 outline-none">Tambah</button>
        </form>
</div>

@endsection