@props(['name' => '', 'method' => 'post', 'cancelRoute' => route('dashboard')])

<form {{ $attributes->merge(['class' => 'grid grid-cols-1 gap-4']) }} method="post">
    @csrf
    @method($method)
    <x-input-label for="name" :value="__('Project name')" />
    <x-text-input id="name" name="name" value="{{ $name }}" />

    @if ($errors->any())
        <x-input-error :messages="$errors->get('name')" />
    @endif

    <div class="flex justify-end gap-4">
        <x-button-link href="{{ $cancelRoute }}">
            {{ __('Cancel') }}
        </x-button-link>

        <x-primary-button>
            {{ __('Save') }}
        </x-primary-button>
    </div>
</form>
