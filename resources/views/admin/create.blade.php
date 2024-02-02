@extends('layouts.app')
@section('content')
<div class="mt-5 ml-10">
    <a href="/" class="mb-10 mt-10 border-2 px-5 py-1 rounded-md hover:bg-slate-600 hover:text-white duration-700 focus:border-slate-200 outline-none">Kembali</a>
</div>
<div class="border-2 rounded-lg mx-10 my-10">
    <div class="">
        <form action="/user/create" method="POST">
            @csrf
                <div class="card">
                    <h1 class="font-semibold text-xl ml-5 my-10">Add User</h1>
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="my-2 border-2 px-5 py-1 rounded-md duration-700 focus:bg-slate-200 focus:border-slate-200 outline-none">
                </div>
                <div class="flex flex-col px-5 py-5">
                    <label for="category_id">User Category</label>
                        <select name="role" class="bg-slate-100 px-4 py-1 rounded" id="role">
                            <option value="">-- SELECT AN OPTION --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->role }}">{{ $user->role }}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <button type="submit" class="w-full flex justify-center items-center bg-slate-300 border-2 py-2 my-10 rounded-md hover:bg-slate-600 hover:text-white duration-700 focus:border-slate-200 outline-none">Tambah</button>
        </form>
</div>

@endsection