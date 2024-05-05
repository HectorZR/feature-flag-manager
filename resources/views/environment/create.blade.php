<x-app-layout>
    <x-header-title title="Create Environment" />

    <div class="w-full flex justify-center">
        <x-card>
            <x-environment-form action="{{ route('project.environment.store', $project) }}"
                cancelRoute="{{ route('project.show', $project) }}" />
        </x-card>
    </div>
</x-app-layout>
