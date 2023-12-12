@extends('mylayouts.app')

@section('title','Edit Task')


@section('styles')
<style>
  .error-message{
    color:red;
    font-size:0.8rem;
  }
</style>
@endsection


@section('content')
{{$errors}}

<form action="{{route('task.update',['id'=>$taskobj->id])}}" method="POST">

@method('PUT')
  {{-- Method spoofing in Laravel allows you to simulate
       HTTP request methods like PUT, PATCH, and DELETE when 
       working withHTML forms that support only GET and POST methods. 
       This enables you to trigger specific actions in your application
       using these other HTTP verbs, even if the form itself is 
       restricted to GET or POST. 
  --}}
@csrf

<div>
  <label for="title">Title</label>
  <input type="text" id='title' name='title' value={{$taskobj->title}}>
  @error('title')
    <p class="error-message">{{$message}}</p>
  @enderror
</div>

<div>
  <label for="description">Description</label>
  <textarea name="description" id="description" rows="5">
    {{$taskobj->description}}
  </textarea>
  @error('description')
    <p class="error-message">{{$message}}</p>
  @enderror
</div>

<div>
  <label for="long_description">Long Description</label>
  <textarea name="long_description" id="long_description" rows="10">
    {{$taskobj->long_description}}
  </textarea>
  @error('long_description')
    <p class="error-message">{{$message}}</p>
  @enderror
</div>

<div>
<button type='submit'>Edit task</button>
</div>
</form>
@endsection