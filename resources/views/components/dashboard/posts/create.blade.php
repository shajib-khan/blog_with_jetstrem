<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Posts') }}
        </h2>
        <div class="space-x-4">
            {{-- Index Link --}}
            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('Index') }}
            </x-nav-link>

            {{-- Create Link --}}
            <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>



    {{-- Main Content --}}
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="p-6">

                    <x-form action="{{ route('posts.store') }}" has-files>
                        <div class="space-y-6">

                            {{-- Cover Image --}}
                            <div>
                                <x-label for="cover_image" value="{{ __('Cover Image') }}" />
                                <input name="cover_image" type="file" id="cover_image">
                                <span class="mt-2 text-xs text-gray-500">File type:jpg,png only</span>
                                <x-input-error for="cover_image" class="mt-2" />
                            </div>

                            {{-- Title --}}
                            <div>
                                <x-label for="title" value="{{ __('Title') }}" />
                                <x-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
                                <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                                <x-input-error for="title" class="mt-2" />
                            </div>

                            {{-- Category --}}
                            <div>
                                <x-label for="category_id" value="{{ __('Categories') }}" />
                                <select name="category_id" id="category_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                    <option value="">Please select a category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="category_id" class="mt-2" />
                            </div>

                            {{-- Body --}}
                            <div>

                                <x-trix name="body" styling="overflow-y-scroll h-96"></x-trix>
                                <x-input-error for="body" class="mt-2" />
                            </div>

                            {{-- Schedule --}}
                            <div>
                                <x-label for="published_at" value="{{ __('Schedule Date') }}" />
                                <x-pikaday name="published_at" format="YYYY-MM-DD" />
                                <x-input-error for="published_at" class="mt-2" />
                            </div>

                            {{-- Tags --}}
                            <div>
                                <x-label for="tags" value="{{ __('Body') }}" />
                                <select name="tags[]" id="create-post" multiple x-data="{}" x-init="function () { choices($el) }">
                                    @foreach ($tags as $tag )
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Meta Description --}}
                            <div>
                                <x-label for="meta_description" value="{{ __('Meta description') }}" />
                                <x-trix name="meta_description" styling="overflow-y-scroll h-40"></x-trix>
                                <x-input-error for="meta_description" class="mt-2" />
                            </div>

                        </div>


                        <x-button class="mt-12">
                            {{ __('Create') }}
                        </x-button>

                    </x-form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

