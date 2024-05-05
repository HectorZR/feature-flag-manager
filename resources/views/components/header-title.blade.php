@props(['title'])

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>

        <div class="flex gap-4 items-center">
            {{ $slot }}
        </div>
    </div>
</x-slot>
