@extends('layouts.app')

@section('main')
  <h1 class="card-header">
    Edit: <small>{{ $post->post_name }}</small>
  </h1>
  <div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul><br><br><br>
    @endif
      <form method="post" action="{{ route('posts.update', $post->id) }}">
        @method('PATCH')
        @csrf
            <div>
                <label for="name">Title</label>
                <input type="text" name="post_title" required value={{ $post->post_title }}/>
            </div>
            <div>
                <label for="price">Description</label>
                <input type="text" name="post_description" required value={{ $post->post_description }}/>
            </div>
            <div>
                <label for="price">Image URL</label>
                @if(isset($post->post_image) && !empty($post->post_image))
                    <input type="text" name="post_image" value={{ $post->post_image }} required/>
                    <img src="{{ $post->post_image }}" style="width: 80px; height: 80px;"></img>
                @else
                    <input type="text" name="post_image"/>
                    <img src="https://media.giphy.com/media/804TNmnYLfNao/giphy.gif" style="width: 80px; height: 80px;"></img>
                @endif
            </div>
            <div>
                <label for="price">Video URL</label>
                @if(isset($post->post_video))
                    <input type="text" name="post_video" value={{ $post->post_video }}/>
                    <video poster="{{ $post->post_image }}" src="{{ $post->post_video }}" style="width: 80px; height: 80px;"></video>
                @else
                    <input type="text" name="post_video" value={{ $post->post_video }}/>
                    <video poster="https://media.giphy.com/media/OsOP6zRwxrnji/giphy.gif" src="https://media.giphy.com/media/OsOP6zRwxrnji/giphy.mp4" style="width: 80px; height: 80px;"></video>
                @endif
            </div>
            <div>
                <label for="price">Post Link</label>
                <input type="text" name="post_link" value={{ $post->post_link }}/>

                <label for="price">Target</label>
                <input type="text" name="post_link" value="_self" value={{ $post->post_qty }}/>
            </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
@endsection
