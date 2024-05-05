@props(['route'])

<form action="{{ $route }}" method="POST">
    @csrf
    @method('DELETE')
    <x-secondary-button type="submit" class="!bg-red-600 text-white">
        {{ __('Delete') }}
    </x-secondary-button>
</form>
