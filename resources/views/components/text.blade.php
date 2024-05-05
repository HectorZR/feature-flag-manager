@props(['as' => 'p'])

<{{ $as }} {{ $attributes->merge(['class' => 'text-gray-800 dark:text-gray-200']) }}>
    {{ $slot }}
    </{{ $as }}>
