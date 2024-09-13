<table>
@foreach ($posts as $post)
    <tr  >
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->posted }}</td>
        <td>{{ $post->content }}</td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->updated_at }}</td>
        <td>
            <form action="{{route('post.destroy' , $post->id)}}" method="POST" >
                @method('DELETE')
                @csrf
                <button type="submit" >Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</table>