
<h2>{{ucfirst($data_type)}}s</h2>
@foreach($records as $record)
    <div class="row">
        <div class="col-md-8">
            <a href = "{{$data_type}}/{{$record->id}}">{{$record->name}}</a>
        </div>
        <div class="col-md-2">
            <a href="{{$data_type}}/{{$record->id}}/edit">Edit</a>
        </div>
        <div class="col-md-2">
            <a href="{{$data_type}}/deactivate/{{$record->id}}">Deactivate</a>
        </div>
    </div>
    <br>
@endforeach