@extends('layouts.main')

@section('title', 'Create Post')

@section('content')

<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label  class="form-label">New Title</label>
              <input type="text" class="form-control" name="title"  value="{{old('title')}}">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label  class="form-label">New Post</label>
              <input type="text" class="form-control" name="body" value="{{old('body')}}" >
              @error('body')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <input type="datetime-local" class="form-control"  name="published_at" value="{{ now()->format('Y-m-d\TH:i')}}" hidden>
              @error('published_at')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="toggle-switch">
                  <label for="enabled">Enabled</label>
                  <input type="hidden" name="enabled" value="0"> 
                  <input type="checkbox" name="enabled" {{ old('enabled') == 1 ? 'checked' : '' }} value="1"> 
                  <span class="slider"></span>
              </label>
           </div>
           <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" class="form-control-file" name="image" id="image" value="{{ old('image') }}">
          @error('image')
              <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror
          </div>

           <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

@endsection
