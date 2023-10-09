@props(['cvens', 'com10s', 'titulo', 'nameRoute'])

@php
    $classes_nav_link = request()->routeIs($nameRoute) ?? false ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<!-- Settings Dropdown -->
<div class="sm:flex sm:items-center sm:ml-6 {{ $classes_nav_link }}">

    <div class="relative h-full">
        <x-custom.dropdown align="right" width="48">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md h-full">
                    <button type="button"
                        class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none dark:focus:bg-gray-700 dark:active:bg-gray-700 transition ease-in-out duration-150">
                        {{ $titulo }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </span>
            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __($titulo) }}
                </div>
                @foreach ($cvens as $cven)
                    <x-custom.dropdown-link href="{{ route($nameRoute, $cven) }}">
                        {{ __($cven.'-'.$com10s->firstWhere('cven', $cven)->tven) }}
                    </x-custom.dropdown-link>
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>
                @endforeach


            </x-slot>
        </x-custom.dropdown>
    </div>

</div>
