{{-- @extends('layout.app') --}}

@forelse ($taskAry as $var)
<div> {{$var->title}}</div>
@empty
<div> There areno elements</div>
@endforelse

@if (true)

{{$taskAry->links()}}

@endif
{{-- 
  the links() method belong to the passed variable
  --}}