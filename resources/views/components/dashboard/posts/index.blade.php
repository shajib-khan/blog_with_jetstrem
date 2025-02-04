
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
        <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
            {{ __('Index') }}
        </x-nav-link>
        <x-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
            {{ __('Create') }}
        </x-nav-link>
    </x-slot>

    <div class="mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
        <x-ui.alerts />
    </div>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <livewire:posts.index>
            </div>
            </div>
            </div>
</x-app-layout>
