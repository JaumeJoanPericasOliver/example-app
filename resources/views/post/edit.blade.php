<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modificar un posts') }}
        </h2>
    </x-slot>

    @include('components.alert')
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('post.update', $post->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="title">Títol</label>
                        <input type="text" style="@error('title') border-color: RED;  @enderror"  value="{{ $post->title }}" name="title" />
                        @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                        <label for="url_clean">Url neta</label>
                        <input type="text" name="url_clean" value="{{ $post->url_clean }}" />
                        @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                        <label for="content">Contingut</label>
                        <textarea name="content" col="3" >{{ $post->content }}</textarea>
                        <input type="submit" value="Crear" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


