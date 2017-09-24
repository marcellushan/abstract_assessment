
<?php
$names = $name;
?>
<h2>{{$label}}</h2>
@foreach($$names as $$name)
        @if($$name->id == $$assessment->$selection)
            {{Form::radio($list_type, $$name->id, true)}} {{$$name->name}}</br>
        @else
            {{Form::radio($list_type, $$name->id, false)}} {{$$name->name}}</br>
        @endif
@endforeach