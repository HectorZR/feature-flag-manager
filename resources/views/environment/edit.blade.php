<x-app-layout>
    <x-header-title title="Edit Environment" />

    <div class="w-full flex justify-center">
        <x-card>
            <x-environment-form name="{{ $environment->name }}" description="{{ $environment->description }}"
                action="{{ route('project.environment.update', [$project, $environment]) }}" method="PATCH"
                cancelRoute="{{ route('project.environment.show', [$project, $environment]) }}" />
            <x-delete-button route="{{ route('project.environment.destroy', [$project, $environment]) }}" />
        </x-card>
    </div>
</x-app-layout>
