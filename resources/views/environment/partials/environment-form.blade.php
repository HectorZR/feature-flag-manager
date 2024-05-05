@props(['name' => '', 'description' => '', 'method' => 'post', 'cancelRoute'])

<form {{ $attributes->merge(['class' => 'grid grid-cols-1 gap-4']) }} method="post">
    @csrf
    @method($method)
    <x-input-label for="name" :value="__('Environment name')" />
    <x-text-input id="name" name="name" value="{{ $name }}" />
    @error('name')
        <x-input-error :messages="$message" />
    @enderror

    <x-input-label for="description" :value="__('Description')" />
    <x-text-input id="description" name="description" value="{{ $description }}" />
    @error('description')
        <x-input-error :messages="$message" />
    @enderror


    <div class="flex justify-end gap-4">
        <x-button-link href="{{ $cancelRoute }}">
            {{ __('Cancel') }}
        </x-button-link>

        <x-primary-button>
            {{ __('Save') }}
        </x-primary-button>
    </div>
</form>
