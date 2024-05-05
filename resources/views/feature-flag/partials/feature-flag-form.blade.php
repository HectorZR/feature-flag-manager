@props(['route', 'method' => 'POST', 'version' => '', 'cancelRoute'])

<x-card>
    <form action="{{ $route }}" method="post" class="flex flex-col gap-2">
        @csrf
        @method($method)

        <x-input-label for="version" :value="__('Version')" />
        <x-text-input id="version" name="version" :value="$version" />
        @error('version')
            <x-input-error :messages="$message" />
        @enderror

        <x-input-label for="releaseDate" :value="__('Release Date')" />
        <input
            class="form-input border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            type="date" id="releaseDate" name="release_date" value="{{ old('releaseDate') }}" />
        @error('release_date')
            <x-input-error :messages="$message" />
        @enderror

        <div class="flex gap-2 justify-start py-2">
            <x-input-label for="isActive" :value="__('Is Active')" />
            <input
                class="form-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:border-indigo-600"
                type="checkbox" id="isActive" name="is_active" checked />
        </div>
        @error('is_active')
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
</x-card>
