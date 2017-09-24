
<?php
$names = $name;
?>
<h2>{{$label}}</h2>
@foreach($$names as $$name)
{{Form::radio($id, $$name->id)}} {{$$name->name}}</br>
@endforeach