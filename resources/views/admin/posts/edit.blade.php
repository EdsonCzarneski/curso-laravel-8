<h1>Editar Post <strong>{{ $post->title }}</strong></h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>    
@endif

<form action="{{ route('posts.update', $post->id)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" value="{{ $post->title }}">
    <textarea name="content" id="content" cols="30" rows="4">{{ $post->content }}</textarea>
    <button type="submit">Editar</button>
</form>