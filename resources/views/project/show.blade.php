<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Project') }}
            </h2>
        </div>
    </x-slot>

    <div class="w-full flex justify-center items-center">
        <x-card>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $project->name }}
            </h2>
            <div class="flex gap-4 mt-4">
                <x-button-link :href="route('project.edit', $project)">
                    {{ __('Edit') }}
                </x-button-link>
                <form action="{{ route('project.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-secondary-button type="submit" class="!bg-red-600 text-white">
                        {{ __('Delete') }}
                    </x-secondary-button>
                </form>
            </div>
        </x-card>

    </div>
</x-app-layout>
