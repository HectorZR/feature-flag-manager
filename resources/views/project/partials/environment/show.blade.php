<div class="flex flex-col gap-2">
    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Enviroments</h1>
    @foreach ($project->environments as $environment)
        <x-card class="mt-0 flex justify-between">
            <div>
                <x-text as="h3" class="text-lg capitalize text-gray-800 dark:text-gray-200">
                    {{ $environment->name }}
                </x-text>
                <x-text class="text-gray-800 dark:text-gray-200">{{ $environment->description }}</x-text>
            </div>

            <div>
                <x-button-link :href="route('project.environment.show', [$project, $environment])">
                    {{ __('View') }}
                </x-button-link>
            </div>
        </x-card>
    @endforeach

</div>
