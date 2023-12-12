@extends('mylayouts.app')

@section('title',$taskobj->title) //no need to close this 
                                   section since the sectioin 
                                   contain no html
                                   {{-- The second parameter defines the default content for the section 
                                    if no content is provided when yielding this section. If content is 
                                    provided when the section is yielded 
                                    it will replace the default content specified in @section(). --}}

@section('content')
<p>{{$taskobj->description}}</p>

@if($taskobj->long_description)
<p>
  {{$taskobj->long_description}}
</p>
@endif
<p>
 created at: {{$taskobj->created_at}}
</p>
<p>
  updated at:{{$taskobj->updated_at}}
</p>

<br>
<br>

{{-- below code for toggling --}}
<div>
  {{-- method of from neeeds to be post ans spoof it to put --}}
  <form method="POST" action="{{route('task.toggle',['task'=>$taskobj->id])}}">
  @csrf
  @method('PUT')
  <button class="btn-success" type="submit">
    Mark as {{$taskobj->completed ? 'not completed' : 'completed'}}
  </button>
  </form>
</div>

{{-- we can access the 'completed' property here tooo for additiional operatioin 
@if ($taskobj->completed)
--}}
{{-- toggling code ends here --}}

<br>
<br>


<form action="{{route('tasks.destroy',['task'=>$taskobj->id])}}" method="POST">
  @csrf
   @method('DELETE'){{--spoofing to invoke a route with delete method --}}
<button type=submit>Delete</button>
  </form>

@endsection
Template inheritane 

