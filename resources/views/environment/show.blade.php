<x-app-layout>
    <x-header-title title="Environment Details" />

    <div class="w-full grid grid-cols-2 px-3 pt-3">
        <div>
            <x-text class="text-xl font-semibold">Details</x-text>
            <x-card class="flex justify-between items-center">
                <div class="flex flex-col gap-2">
                    <x-text as="h2">{{ $environment->name }}</x-text>
                    <x-text>{{ $environment->description }}</x-text>
                </div>

                <div>
                    <x-button-link :href="route('project.environment.edit', [$project, $environment])">
                        {{ __('Edit') }}
                    </x-button-link>
                </div>
            </x-card>
        </div>

        <div>
            <x-text class="text-xl font-semibold">Feature flags</x-text>
            @foreach ($environment->featureFlags as $featureFlag)
                <x-card>
                    <div class="flex justify-between">
                        <div class="grid grid-cols-1">
                            <x-text as="h3" class="text-lg capitalize">
                                {{ $featureFlag->version }}
                            </x-text>
                            <x-text>{{ $featureFlag->releaseDate }}</x-text>
                            <x-text>{{ $featureFlag->isActive }}</x-text>
                        </div>

                        {{-- <div>
                            <x-button-link :href="route('project.environment.feature-flag.show', [$project, $environment, $featureFlag])">
                                {{ __('View') }}
                            </x-button-link>
                        </div> --}}
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>
</x-app-layout>
