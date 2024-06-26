<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create project') }}
            </h2>
        </div>
    </x-slot>

    <section class="w-full flex justify-center items-center">
        <x-card>
            <x-project-form action="{{ route('project.store') }}" method="post" />
        </x-card>
    </section>
</x-app-layout>
