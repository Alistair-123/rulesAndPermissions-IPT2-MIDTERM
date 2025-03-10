<nav class="bg-blue-700 flex justify-between items-center p-5 text-white uppercase w-auto">
    <div>
        <h1 class="text-3xl text-white font-bold">Ipt-2</h1>
    </div>

    <div class="flex gap-5">
        <a class="p-2 rounded-md" href="{{ route('home') }}">Home</a>
        <a class="p-2 rounded-md" href="{{ route('events.index') }}">Index</a>

        @if (auth()->check())
            @if (auth()->user()->hasRole('admin'))
                <a class="p-2 rounded-md" href="{{ route('admin.dashboard') }}"></a>
            @endif
            <a class="p-2 rounded-md" href="{{ route('profile') }}">Profile</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="p-2 rounded-md uppercase">Logout</button>
            </form>
        @else
            <a class="p-2 rounded-md" href="{{ route('login') }}">Login</a>
        @endif
    </div>
</nav>
