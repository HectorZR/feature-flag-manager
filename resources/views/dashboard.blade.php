<x-app-layout>
    <x-header-title title="Dashboard">
        <x-button-link href="{{ route('project.create') }}">
            {{ __('Create project') }}
        </x-button-link>
    </x-header-title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($projects->isEmpty())
                        <p>{{ __('You have no projects yet.') }}</p>
                    @else
                        <div class="grid grid-cols-3 gap-3">
                            @foreach ($projects as $project)
                                <x-card class="max-w-14">
                                    <div class="flex justify-between">
                                        <h3 class="font-semibold text-lg">{{ $project->name }}</h3>
                                        <div class="flex gap-4">
                                            <x-button-link :href="route('project.show', $project)">
                                                {{ __('View') }}
                                            </x-button-link>
                                        </div>
                                    </div>
                                </x-card>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
