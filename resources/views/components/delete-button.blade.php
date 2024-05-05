@props(['route'])

<form action="{{ $route }}" method="POST">
    @csrf
    @method('DELETE')
    <x-danger-button type="submit">
        {{ __('Delete') }}
    </x-danger-button>
</form>
