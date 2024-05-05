<div class="flex flex-col gap-2">
    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Enviroments</h1>
    @foreach ($project->environments as $environment)
        <x-card class="mt-0">
            <h3 class="text-lg capitalize text-gray-800 dark:text-gray-200">
                {{ $environment->name }}
            </h3>
            <p class="text-gray-800 dark:text-gray-200">{{ $environment->description }}</p>
        </x-card>
    @endforeach

</div>
