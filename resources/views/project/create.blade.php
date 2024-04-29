<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create project') }}
            </h2>
        </div>
    </x-slot>

    <section class="w-full flex justify-center items-center">
        <x-card>
            <form action="{{ route('project.store') }}" method="post" class="grid grid-cols-1 gap-4">
                @csrf
                <x-text-input name='name' placeholder="{{ __('Project name') }}" />

                @if ($errors->any())
                    <x-input-error :messages="$errors->get('name')" />
                @endif

                <div class="flex justify-end gap-4">
                    <x-secondary-button>
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button>
                        {{ __('Save') }}
                    </x-primary-button>

                </div>
            </form>
        </x-card>
    </section>
</x-app-layout>