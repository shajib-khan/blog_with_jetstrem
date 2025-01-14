<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
        <x-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('category.index')">
                {{ __('Index') }}
            </x-nav-link>
            <x-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('category.index')">
                {{ __('Create') }}
            </x-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="min-w-full text-start text-sm font-light text-surface dark:text-white">
                    <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                        <tr>
                            <th scope="col" class="px-6 py-4">ID</th>
                            <th scope="col" class="px-6 py-4">NAME</th>
                            <th scope="col" class="px-6 py-4">SUBCATEGORIES</th>
                            <th scope="col" class="px-6 py-4">CREATED DATE</th>
                            <th scope="col" class="px-6 py-4">UPDATED DATE</th>
                            <th scope="col" class="px-6 py-4">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr class="border-b border-neutral-200 dark:border-white/10">
                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{$category->id}}</td>
                            <td class="whitespace-nowrap px-6 py-4">$category->name</td>
                           [
                            @foreach($category->subcategories as $subcategory)
                            <td class="whitespace-nowrap px-6 py-4">{{$subcategory->name}}</td>
                            @endforeach
                            ]
                            <td class="whitespace-nowrap px-6 py-4">{{$category->created_at}}</td>
                            <td class="whitespace-nowrap px-6 py-4">$category->updated_at</td>
                            <td class="whitespace-nowrap px-6 py-4"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
  <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg>

</td>
                            <td class="whitespace-nowrap px-6 py-4"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
