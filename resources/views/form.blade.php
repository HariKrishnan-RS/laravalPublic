@extends('mylayouts.app')

@section('title', isset($taskobj) ?'Edit Task':'Add Task')


{{-- @section('styles')
<style>
  .error-message{
    color:red;
    font-size:0, 8rem;
  }
</style>
@endsection --}}


@section('content')
{{$errors}}
<form action="{{ isset($taskobj) ? route('task.update',['id'=>$taskobj->id]) : route('task.store')}}" method="POST">
@csrf
@isset($taskobj)
  @method('PUT')
@endisset
<div>
  <label for="title">Title</label>
  <input type="text" id='title' name='title' value='{{$taskobj->title ?? old('title')}}'>
  @error('title')
    <p class="error-message">{{$message}}</p>
  @enderror
</div>

<div>
  <label for="description">Description</label>
  <textarea name="description" id="description" rows="5">
    {{$taskobj->description ?? old('description')}}
  </textarea>
  @error('description')
    <p class="error-message">{{$message}}</p>
  @enderror
</div>

<div>
  <label for="long_description">Long Description</label>
  <textarea name="long_description" id="long_description" rows="10">
    {{$taskobj->long_description ?? old('long_description')}}
  </textarea>
  @error('long_description')
    <p class="error-message">{{$message}}</p>
  @enderror
</div>

<div>
<button class="btn" type='submit'>
  @isset($taskobj)
  update task
  @else
  Add task
  @endisset
</button>
</div>
</form>

@endsection
