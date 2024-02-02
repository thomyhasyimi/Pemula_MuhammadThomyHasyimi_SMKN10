@extends('layouts.app')
@section('content')

    <h1 class="text-xl">Data User</h1>
    <table class="border border-black p-2 text-center w-full ">
        <div class="flex justify-end">
            <a href="/user/create" class="bg-sky-300 hover:bg-sky-400 py-2 px-4 rounded transition mb-5">Create</a>
        </div>
        <thead>
            <tr>
                <th class="border-black p-2 text-center border">No</th>
                <th class="border-black p-2 text-center border">Name</th>
                <th class="border-black p-2 text-center border">Role</th>
                <th class="border-black p-2 text-center border">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)    
                <tr class="hover:bg-indigo-200">
                    <td class="border border-black p-2 text-center">{{ $key+1 }}</td>
                    <td class="border border-black p-2 text-center">{{ $user->name }}</td>
                    <td class="border border-black p-2 text-center">{{ $user->role }}</td>
                    <td class="border p-2 text-center border-black">
                        <div class="buttons flex gap-2 justify-around w-full">
                            <a href="/user/edit/{{ $user->id }}"><button class="bg-yellow-300 hover:bg-yellow-400 py-2 px-4 rounded transition">Edit</button></a>
                            <form action="/user/{{ $user->id }}/delete" method="POST">
                                @csrf
                                <button class="bg-red-300 hover:bg-red-400 py-2 px-4 rounded transition">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
