@extends('layouts.app')

@section('main')
<div class="uper">
  @if(session()->get('success'))
    <div>
      {{ session()->get('success') }}
    </div><br><br><br>
  @endif
    <h1>Post List</h1>
    <br>
    <a href="{{ route('posts.create') }}"><button>Novo</button></a></td>
    <br><br>
  <table>
    <thead>
        <tr>
          <td>ID</td>
          <td> Title </td>
          <td> Description </td>
          <td> Image </td>
          <td> Video </td>
          <td> Link </td>
          <td> Target </td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->post_title }}</td>
            <td>{{ $post->post_description }}</td>
            <td>
                @if(isset($post->post_image) && !empty($post->post_image))
                    <img src="{{ $post->post_image }}" style="width: 80px; height: 80px;"></img>
                @else
                    <img src="https://media.giphy.com/media/804TNmnYLfNao/giphy.gif" style="width: 80px; height: 80px;"></img>
                @endif
            </td>
            <td>
                @if(isset($post->post_video))
                    <video poster="{{ $post->post_image }}" src="{{ $post->post_video }}" style="width: 80px; height: 80px;"></video>
                @else
                    @if(isset($post->post_image) && !empty($post->post_image))
                        <img src="{{ $post->post_image }}" style="width: 80px; height: 80px;"></img>
                    @else
                        <video poster="https://media.giphy.com/media/OsOP6zRwxrnji/giphy.gif" src="https://media.giphy.com/media/OsOP6zRwxrnji/giphy.mp4" style="width: 80px; height: 80px;"></video>
                    @endif
                @endif
            </td>
            <td>{{ $post->post_link }}</td>
            <td>{{ $post->post_target }}</td>

            <td><a href="{{ route('posts.edit', $post->id) }}"><button>Edit</button></a></td>
            <td>
                <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
