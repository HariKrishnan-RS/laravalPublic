{{-- <html>
  <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
     --}}


 <div>
  @if(count($taskAry))
  <div> Not Empty</div>
  @else
  <div> Empty</div>
  @endif
</div>

//////////////////////////////////////////////

<div>
  @foreach($taskAry as $var)
  <div>  {{$var->title}}  </div>
  @endforeach
</div>

//////////////////////<br>
alternative mothod- ' no need of the if directive '<br>
<br>

@forelse ($taskAry as $var)
<div> {{$var->title}}</div>
@empty
<div> There areno elements</div>
@endforelse


/////////////////////////////<br>
tittle as link
<br><br>


@forelse ($taskAry as $taskobj)
<a href="{{route('tasks.title',['id'=>$taskobj->id])}}">{{$taskobj->title}}</a> 
        //the parameter 'id' will become the quary string to the task.title
<br>
@empty
<div> There areno elements</div>
@endforelse




{{-- 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 </body>
</html> --}}
