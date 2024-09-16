<div class="block rounded-lg bg-white shadow-secondary-1 dark:bg-surface-dark">
    <div class="p-6 text-surface dark:text-white" >
        <h5 class="mb-2 text-xl font-medium leading-tight">{{ $post->title }}</h5>
        <p class="mb-4 text-base">{{ $post->content  }}</p>
        <a href="{{route('post.show' , $post->id )}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Veure</a>
        <a href="{{route('post.edit' , $post->id )}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</a>
        <form action="{{route('post.destroy' , $post->id)}}" method="POST" class="float-right">
           @method('DELETE')
           @csrf
           <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" >Delete</button>
        </form>
    </div>
</div>