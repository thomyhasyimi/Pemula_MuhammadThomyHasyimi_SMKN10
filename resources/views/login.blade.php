<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="h-screen container justify-center flex">
        <div class="flex flex-col justify-center items-center my-10">
            <div class="flex flex-col items-center justify-center gap-5 px-20 rounded-lg duration-1000 hover:shadow-2xl hover:bg-white/20 hover:border-2 border">
                @if(session('status'))
                    <h1 class="px-8 py-2 rounded bg-red-400 text-white">{{ session('status') }}</h1>
                @endif
                <form action="" method="POST">
                    @csrf
                    <div class="head flex my-5 justify-center">
                        <h2 class="text-black font-semibold text-xl">FINTECH</h2>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="border-2 outline-none rounded-md px-3 py-1 focus:bg-slate-200 duration-700" required>
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="border-2 outline-none rounded-md px-3 py-1 focus:bg-slate-200 duration-700" required>
                    </div>
                    <div class="flex justify-center mb-3">
                        <button type="submit" class="border-2 px-5 py-1 rounded-md hover:bg-slate-600 hover:text-white duration-700 focus:border-slate-200 outline-none">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>