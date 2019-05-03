@extends('layouts.app')

@section('main')
  <h1 class="card-header">
    New Post
  </h1>

  <div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
        <br>
        <br>
        <br>
    @endif
      <form method="post" action="{{ route('posts.store') }}">
          <div>
              {{ csrf_field() }}
              <label for="name">Title</label>
              <input type="text" name="post_title" required/>
          </div>
          <div>
              <label for="price">Description</label>
              <input type="text" name="post_description" required/>
          </div>
          <div>
              <label for="price">Image URL</label>
              <input type="text" name="post_image" required/>
          </div>
          <div>
              <label for="price">Video URL</label>
              <input type="text" name="post_video"/>
          </div>
          <div>
              <label for="price">Post Link</label>
              <input type="text" name="post_link"/>

              <label for="price">Target</label>
              <input type="text" name="post_link" value="_self"/>
          </div>
          <button type="submit"> Add </button>
      </form>
  </div>
@endsection
