<header
    x-data="{ mobileMenuOpen: false }"
    class="flex justify-between bg-black shadow-md text-white"
>
    <div class="px-10 text-yellow-500" style="font-size: 50px; font-weight:900; display:flex; align-items:center;">
        Know Your Food
    </div>

    <!-- Responsive Menu -->
    <div
        class="block fixed z-10 top-0 bottom-0 h-full w-[220px] transition-all bg-slate-900 md:hidden"
        :class="mobileMenuOpen ? 'left-0' : '-left-[220px]'"
    >
        <ul>
            <!-- Check if the user is authenticated -->
            @if (!Auth::guest())
                <li x-data="{ open: false }" class="relative">
                    <a
                        @click="open = !open"
                        class="cursor-pointer flex justify-between items-center py-2 px-3 hover:bg-slate-800"
                    >
                        <span class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                            {{ Auth::user()->name }}
                        </span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                    <ul
                        x-show="open"
                        x-transition
                        class="z-10 right-0 bg-slate-800 py-2"
                    >
                        <!-- Logout Option -->
                        <li class="hover:bg-slate-900">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a
                                    href="{{ route('logout') }}"
                                    class="flex items-center px-3 py-2 hover:bg-slate-900"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                        />
                                    </svg>
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>

                <!-- New "Update Items" Button for Admins -->
                <li>
                    <a
                        href="{{ route('admin.products.index') }}"
                        class="block text-center text-white bg-yellow-500 py-2 px-3 rounded shadow-md hover:bg-yellow-600 active:bg-yellow-800 transition-colors w-full"
                    >
                        Update Items
                    </a>
                </li>
            @else
                <!-- If user is not authenticated -->
                <li>
                    <a
                        href="{{ route('login') }}"
                        class="flex items-center py-2 px-3 transition-colors hover:bg-slate-800"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            />
                        </svg>
                        Login
                    </a>
                </li>
                <li class="px-3 py-3">
                    <a
                        href="{{ route('register') }}"
                        class="block text-center text-white bg-yellow-500 py-2 px-3 rounded shadow-md hover:bg-yellow-500 active:bg-yellow-800 transition-colors w-full"
                    >
                        Register now
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <!-- Desktop Menu -->
    <nav class="hidden md:block">
        <ul class="grid grid-flow-col items-center">
            @if (!Auth::guest())
                <li x-data="{ open: false }" class="relative">
                    <a
                        @click="open = !open"
                        class="cursor-pointer flex items-center py-navbar-item px-navbar-item pr-5 hover:bg-slate-900"
                    >
                        <span class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                            {{ Auth::user()->name }}
                        </span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 ml-2"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                    <ul
                        @click.outside="open = false"
                        x-show="open"
                        x-transition
                        x-cloak
                        class="absolute z-10 right-0 bg-slate-800 py-2 w-48"
                    >
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a
                                    href="{{ route('logout') }}"
                                    class="flex px-3 py-2 hover:bg-slate-900"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                        />
                                    </svg>
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>

                <!-- Add Update Items for logged-in users -->
                <li>
                    <a
                        href="{{ route('admin.products.index') }}"
                        class="inline-flex items-center text-white bg-yellow-500 py-2 px-3 rounded shadow-md hover:bg-yellow-600 active:bg-yellow-800 transition-colors mx-5"
                    >
                        Update Items
                    </a>
                </li>
            @else
                <li>
                    <a
                        href="{{ route('login') }}"
                        class="flex items-center py-navbar-item px-navbar-item hover:bg-slate-900"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            />
                        </svg>
                        Login
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('register') }}"
                        class="inline-flex items-center text-white bg-yellow-500 py-2 px-3 rounded shadow-md hover:bg-yellow-600 active:bg-yellow-800 transition-colors mx-5"
                    >
                        Register now
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    <!-- Mobile menu button -->
    <button
        @click="mobileMenuOpen = !mobileMenuOpen"
        class="p-4 block md:hidden"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16"
            />
        </svg>
    </button>
</header>
