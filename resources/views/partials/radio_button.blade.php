
<?php
$names = $name;
?>
<h2>{{$label}}</h2>

@foreach($$names as $$name)
    <div class="row">
<div class="col-md-8">
    {{$$name->name}}
</div>
    <div class="col-md-2">
{{Form::radio($id, $$name->id)}}
{{--<input type="radio">--}}
</div>
    </div>
@endforeach
