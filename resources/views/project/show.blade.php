<x-app-layout>
    <x-header-title title="Project">
        <x-button-link href="{{ route('project.environment.create', $project) }}">
            {{ __('Create environment') }}
        </x-button-link>
    </x-header-title>

    <div class="w-full grid grid-cols-2 gap-4 py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-2">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Details</h1>
            <x-card class="mt-0 flex justify-between item-center">
                <h2 class="capitalize font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
