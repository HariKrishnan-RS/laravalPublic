<?php
// Blade directives in Laravel's Blade templating engine are special syntax elements that 
// provide shortcuts and expressive ways to write common PHP logic directly within your views.
// These directives are enclosed within {{ }} or {!! !!} tags and start with the @ symbol.
?>

This is the value  of name from the view mathod: {{$name}}

<?php
//To check if tehe variable is available we can use the directive @isset (conditional rendering)
?>

@isset($name)
<br>This is the value  of name from the view mathod: {{$name}}
@endisset