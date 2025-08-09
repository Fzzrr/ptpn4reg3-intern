<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Akun</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</head>

<body class="dark:bg-gray-800 bg-white">
    <nav class="fixed top-0 z-50 w-full border-b border-gray-200 bg-cyan-800 border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                        <img src="{{ asset('images/logo.png') }}" class="h-8 me-3" alt="Logo PTPN" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">PTPN
                            IV Regional III</span>
                        </span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full bg-white" src="{{ asset('images/profile_logo.png') }}"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{ $user->username }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar mt-10"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0  dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-stone-700 hover:bg-gray-100 dark:hover: group">
                        <div class="w-8 h-8 bg-inherit rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/dashboard_logo.png') }}" alt="icon baru" class="w-5 h-5" />
                        </div>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.account') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-stone-700 hover:bg-gray-100 dark:hover: group">
                        <div class="w-8 h-8 bg-inherit rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/account_logo.png') }}" alt="icon baru" class="w-5 h-5" />
                        </div>
                        <span class="ms-3">Account</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('buy') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-stone-700 hover:bg-gray-100 dark:hover: group">
                        <div class="w-8 h-8 bg-inherit rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/logo_beli.png') }}" alt="icon baru" class="w-5 h-5" />
                        </div>
                        <span class="ms-3">Pembelian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('progress') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-stone-700 hover:bg-gray-100 dark:hover: group">
                        <div class="w-8 h-8 bg-inherit rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/progress_logo.png') }}" alt="icon baru" class="w-5 h-5" />
                        </div>
                        <span class="ms-3">Progress</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('view') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-stone-700 hover:bg-gray-100 dark:hover: group">
                        <div class="w-8 h-8 bg-inherit rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/view_logo.png') }}" alt="icon baru" class="w-5 h-5" />
                        </div>
                        <span class="ms-3">View</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-stone-700 hover:bg-gray-100 dark:hover: group mt-69">
                        <div class="w-8 h-8 bg-inherit rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/logout_logo.png') }}" alt="icon baru" class="w-5 h-5" />
                        </div>
                        <span class="ms-3">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main> <!-- pt-20 untuk memberi ruang navbar fixed -->
        @yield('content')
    </main>
    <!-- Footer atau script tambahan -->
</body>

</html>
