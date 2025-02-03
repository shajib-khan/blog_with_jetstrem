<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
        <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
            {{ __('Index') }}
        </x-nav-link>
        <x-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
            {{ __('Create') }}
        </x-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="p-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"  :value="$category->name" required autofocus autocomplete="name" />
                        <small class="mb-4 text-gray-500 w-full">Note: Maximum 200 Characters</small>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                   <x-button>
                    Update
                   </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
