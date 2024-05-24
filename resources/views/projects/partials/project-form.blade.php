@php
    $disabled = isset($disabled) ? $disabled : false;
@endphp

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Project Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("The title and description of the project") }}
        </p>
    </header>

    <form method="post" action="{{ $action }}" class="mt-6 space-y-6">
        @unless($disabled)
            @csrf
        
    @endunless

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" :$disabled name="title" type="text" class="mt-1 block w-full" :value="old('title') ?: $title ?? ''" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>
    
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea-input id="description" :$disabled name="description" type="text" class="mt-1 block w-full" :value="old('description') ?: $description ?? ''" required autofocus autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>


        @unless($disabled)
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'project-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        @endunless
    </form>
</section>