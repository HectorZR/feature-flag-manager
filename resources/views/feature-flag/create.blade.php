<x-app-layout>
    <x-header-title title="Create new feature flag" />

    <div class="w-full flex justify-center">
        <x-card>
            <x-feature-flag-form :route="route('project.environment.feature-flag.store', [$project, $environment])"
                cancelRoute="{{ route('project.environment.show', [$project, $environment]) }}" />
        </x-card>
    </div>
</x-app-layout>
