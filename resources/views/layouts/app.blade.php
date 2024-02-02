<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="sidebar h-full w-[200px] fixed bg-indigo-300">
        <div class="sidebar-item flex flex-col p-4 gap-2">
            @if(auth()->user()->role == 'bank')
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/">Home</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/topup">Top-up</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/withdraw/bank">Withdraw</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/topup/pending">Pending Transactions</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/transactions">Transactions</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/bank/daily/transactions">Daily Transactions</a>

            @elseif(auth()->user()->role == 'shop')
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/">Home</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/product">Products</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/pending">Accepted Products</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/product/transactions">Transactions</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/product/history/transactions">History Transactions</a>
            @elseif(auth()->user()->role == 'student')
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/">Home</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/student/product">Products</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/student/cart">Cart</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/withdraw/student">Withdraw</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/student/topup">Topup</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/student/transactions">Transactions</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/student/past-orders">Past Orders</a>
            @elseif(auth()->user()->role == 'admin')
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/">Home</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/user">Data User</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/user/transactions">Transactions</a>
            <a class="hover:bg-indigo-100 transition p-1 rounded" href="/user/history/transactions">History Transactions</a>
            @endif
        </div>
        <div class="sidebar-logout fixed bottom-0 mb-4 ml-4">
            <div class="profile flex flex-col justify-center gap-2 items-center">
                <div class="profile-desc flex items-center flex-row text-xl select-none">
                    {{ auth()->user()->name }}
                </div>
                <div class="btn-logout">
                    <form action="/logout" method="GET">
                        @csrf
                        <button class="bg-indigo-400 hover:bg-indigo-500 p-2 rounded">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="content ml-[200px] p-8">
        @yield('content')
    </div>
</body>
</html>