<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pixel Position</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite('resources/css/app.css') --}}

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">


</head>

<body class="font-sans antialiased bg-black">
    <div class="min-h-screen bg-black text-white px-10">


        {{-- page header --}}

        <nav class="flex justify-between items-center gap-8 sm:px-8 py-5 border-b border-white/10">
            <div class="hidden">
                <a href="">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                </a>
            </div>
            <div class="space-x-6">
                <x-nav-link href="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')" class="text-red">Jobs</x-nav-link>
                <x-nav-link href="">Careers</x-nav-link>
                <x-nav-link href="">Salaries</x-nav-link>
                <x-nav-link href="">Companies</x-nav-link>
            </div>

            <div>
                @auth
                    <div class="flex justify-center items-center gap-6">
                        <x-nav-link href="{{ route('jobs.create') }}" :active="request()->routeIs('jobs.create')">Post A Job</x-nav-link>

                        <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">Your Profile</x-nav-link>
                        <img class="inline-block size-14  rounded-full" id="dropwdown_controller"
                            src="{{ asset('storage/images/' . auth()->user()->avatar) }}" alt="">


                        <div id="dropwdown"
                            class="dropdown_profile fixed rounded-xl top-[5.5rem] w-50 flex justify-center items-center flex-col gap-3 p-3 bg-white/5 scale-0 transition duration-100">
                            <img class="w-10 aspect-square rounded-full"
                                src="{{ asset('storage/images/' . auth()->user()->avatar) }}" alt="">
                            <h1>
                                @if (auth()->check())
                                    <h1>{{ auth()->user()->name }}</h1>
                                @endif
                            </h1>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="mt-4">
                                    Logout
                                </x-danger-button>
                            </form>
                        </div>
                    </div>
                @endauth


                @guest
                    <div class="gap-3 flex justify-center items-center">

                        <x-nav-link href="/login" :active="request()->routeIs('login')"> login</x-nav-link>
                        <x-nav-link href="/register" :active="request()->routeIs('register')">register</x-nav-link>
                    </div>
                @endguest
            </div>

            {{-- mobile --}}

            <div class="md:hidden">
                <a href="">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                </a>
            </div>


            <button data-collapse-toggle="navbar-mobile" type="button" id="toggleBtn"
                class="inline-flex items-center p-3 w-10 h-10 justify-center text-sm text-white md:hidden focus:outline-none  dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 cursor-pointer rounded-full hover:bg-white/10 transition duration-75"
                aria-controls="navbar-mobile" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>



            <div id="navbar-mobile"
                class="absolute border  border-white/10  justify-center items-center w-[95%] top-0 right-0 pt-1.5 px-[0.4rem] hidden">
                <div class="sm:space-x-6 flex flex-col justify-center items-center w-full bg-black py-6">
                    <div class="flex justify-between items-center w-full  gap-2 px-5 mb-6">
                        <a href="">
                            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
                        </a>

                        <button id="hidden_btn" class="text-white cursor-pointer">
                            <i class="ri-close-line text-white text-[2rem] rounded-full  hover:bg-white/10 transition duration-75 p-1" ></i>
                        </button>
                    </div>
                    <x-mobile-nav-link href="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')"
                        class="text-red">Jobs</x-mobile-nav-link>
                    <x-mobile-nav-link href="">Careers</x-mobile-nav-link>
                    <x-mobile-nav-link href="">Salaries</x-mobile-nav-link>
                    <x-mobile-nav-link href="">Companies</x-mobile-nav-link>
                    @auth

                        <x-mobile-nav-link href="{{ route('jobs.create') }}" :active="request()->routeIs('jobs.create')">Post A
                            Job</x-mobile-nav-link>

                        <x-mobile-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">Your
                            Profile</x-mobile-nav-link>
                        <img class="inline-block size-14  rounded-full" id="dropwdown_controller"
                            src="{{ asset('storage/images/' . auth()->user()->avatar) }}" alt="">


                        <div id="dropwdown"
                            class="dropdown_profile fixed rounded-xl top-[5.5rem] w-50 flex justify-center items-center flex-col gap-3 p-3 bg-white/5 scale-0 transition duration-100">
                            <img class="w-10 aspect-square rounded-full"
                                src="{{ asset('storage/images/' . auth()->user()->avatar) }}" alt="">
                            <h1>
                                @if (auth()->check())
                                    <h1>{{ auth()->user()->name }}</h1>
                                @endif
                            </h1>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="mt-4">
                                    Logout
                                </x-danger-button>
                            </form>
                        </div>
                    @endauth


                    @guest
                        <x-mobile-nav-link href="/login" :active="request()->routeIs('login')"> login</x-mobile-nav-link>
                        <x-mobile-nav-link href="/register" :active="request()->routeIs('register')">register</x-mobile-nav-link>

                    @endguest
                </div>

            </div>

            <script>
                const toggleBtn = document.getElementById("toggleBtn");
                const hidden_btn = document.getElementById("hidden_btn");
                const navbar_mobile = document.getElementById("navbar-mobile");
                if (toggleBtn) {
                    toggleBtn.addEventListener("click", function() {
                        navbar_mobile.classList.remove("hidden");
                        navbar_mobile.classList.add("flex-col");
                    })
                }

                if(hidden_btn){
                    hidden_btn.addEventListener("click", function() {
                        navbar_mobile.classList.add("hidden");
                    })
                }
            </script>

        </nav>

        <!-- Page Content -->
        <main class="mx-auto py-5 max-w-[986px]">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
