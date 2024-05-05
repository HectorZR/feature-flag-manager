<x-app-layout>
    <x-header-title title="Edit feature flag" />

    <div class="w-full flex justify-center">
        <x-card>
            <x-feature-flag-form :route="route('project.environment.feature-flag.update', [$project, $environment, $featureFlag])"
                cancelRoute="{{ route('project.environment.show', [$project, $environment]) }}"
                version="{{ $featureFlag->version }}" release_date="{{ $featureFlag->release_date }}"
                is_active="{{ $featureFlag->is_active }}" method="PATCH" />
            <x-delete-button :route="route('project.environment.feature-flag.destroy', [$project, $environment, $featureFlag])" />
        </x-card>
    </div>
</x-app-layout>
