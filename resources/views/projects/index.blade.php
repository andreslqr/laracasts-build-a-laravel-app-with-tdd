<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-end max-w-7xl mx-auto sm:px-6 lg:px-8 pb-6">
            <x-primary-button as-link href="{{ route('projects.create') }}">
                {{ __('Create project') }}
            </x-primary-button>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <ul>
                    @forelse ($projects as $project)
                        <li>
                            <a href="{{ $project->path() }}">
                                {{ $project->title }}
                            </a>
                        </li>

                    @empty
                        <li>
                            No current projects
                        </li>
                        
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

</x-app-layout>