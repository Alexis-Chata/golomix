@props(['cvens' => collect(), 'com10s' => collect(), 'com05s' => collect(), 'titulo', 'nameRoute', 'allroute'])

@php
    $classes_responsive_nav_link = request()->routeIs($nameRoute) || request()->routeIs($allroute) ?? false ? 'block w-full pl-3 pr-4 border-l-4 border-indigo-400 dark:border-indigo-600 text-left text-base font-medium text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-200 focus:bg-indigo-100 dark:focus:bg-indigo-900 focus:border-indigo-700 dark:focus:border-indigo-300 transition duration-150 ease-in-out' : 'block w-full pl-3 pr-4 border-l-4 border-transparent text-left text-base font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:border-gray-300 dark:hover:border-gray-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:bg-gray-50 dark:focus:bg-gray-700 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<!-- Settings Dropdown -->
<div class="sm:flex sm:items-center sm:ml-6 {{ $classes_responsive_nav_link }}">
    <div class="relative">
        <x-custom.dropdown align="right" width="48">
            <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                    <button type="button"
                        class="py-3 inline-flex items-center border border-transparent text-base leading-4 font-medium rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none dark:focus:bg-gray-700 dark:active:bg-gray-700 transition ease-in-out duration-150">
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

                @hasanyrole('Super-Admin')
                    <x-custom.dropdown-link href="{{ route($allroute) }}">
                        {{ __('Todos') }}
                    </x-custom.dropdown-link>
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    @forelse ($com10s->sortBy('cven') as $com10)
                        <x-custom.dropdown-link href="{{ route($nameRoute, $com10->cven) }}">
                            {{ __($com10->cven . '-' . $com10->tven) }}
                        </x-custom.dropdown-link>
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>
                    @empty
                    @endforelse

                    @forelse ($com05s->sortBy('ccon') as $com05)
                        <x-custom.dropdown-link href="{{ route($nameRoute, $com05->ccon) }}">
                            {{ __($com05->ccon . '-' . $com05->tnom) }}
                        </x-custom.dropdown-link>
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>
                    @empty
                    @endforelse
                @endhasanyrole

                @forelse ($cvens as $cven)
                    <x-custom.dropdown-link href="{{ route($nameRoute, $cven) }}"> {{ __(!is_null($com10s->firstWhere('cven', $cven)) ? $cven . '-' . $com10s->firstWhere('cven', $cven)->tven : '') }}
                        </x-dropdown-link>
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>
                    @empty
                @endforelse

            </x-slot>
            </x-dropdown>
    </div>

</div>
