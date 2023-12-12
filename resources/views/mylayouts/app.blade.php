<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="/css/app.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  @yield('styles')
</head>
<body>
  
  <h1 class="mb-4">
  @yield('title')
  </h1>
 
  @if(session()->has('success'))
  {{--
    Session is a facad with so many static functions
    but
    session() is  a helper function, 
    and it belongs to Laravel's global helper functions.
    Returns an instance of the Illuminate\Session\Store class.
    Has methods like get() put() has() forget()etc
   Checking if a session variable exists using 
   session()->has('success')
   does not automatically remove the session variable. 
   To remove a specific session variable in Laravel, 
   you can use the forget() method:--}}
  <div>{{session('success')}}</div>
  {{-- can use get() method too for above line --}}
  @endif
  
  <div>
@yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>