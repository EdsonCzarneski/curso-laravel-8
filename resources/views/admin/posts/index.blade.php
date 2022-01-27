<h1>Posts</h1>

<a href="{{route('posts.create')}}">Criar novo post</a>
<hr/>

@foreach ($posts as $posts)
    <p>{{ $posts->title}}</p>
@endforeach