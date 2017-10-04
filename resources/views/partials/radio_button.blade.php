
<?php
$names = $name;
?>
<h2>{{$label}}</h2>

@foreach($$names as $$name)
    <div class="row">
<div class="col-md-11 radio_list">
    {{$$name->name}}
</div>
    <div class="col-md-1">
{{Form::radio($id, $$name->id)}}
{{--<input type="radio">--}}
</div>
    </div>
@endforeach
