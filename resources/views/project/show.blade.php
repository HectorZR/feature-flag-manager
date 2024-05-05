<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Project') }}
            </h2>
        </div>
    </x-slot>

    <div class="w-full px-9 grid grid-cols-2 gap-4 pt-8">
        <div class="flex flex-col gap-2">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Details</h1>
            <x-card class="mt-0 flex justify-between item-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $project->name }}
                </h2>

                <x-button-link :href="route('project.edit', $project)">
                    {{ __('Edit') }}
                </x-button-link>
            </x-card>

        </div>

        @include('project.partials.environment.show')
    </div>
</x-app-layout>
