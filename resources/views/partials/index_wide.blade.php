
<h2>Active {{ucfirst($data_type)}}s</h2>
@foreach($records as $record)
    <div class="row">
        <div class="col-md-8">
            {{$record->name}}
        </div>
        <div class="col-md-2">
            <a href="{{$data_type}}/{{$record->id}}/edit"  class="btn btn-warning" role="button">Edit</a>
        </div>
        <div class="col-md-2">
            <a href="{{$data_type}}/deactivate/{{$record->id}}" class="btn btn-danger" role="button">Deactivate</a>
        </div>
    </div>
    <br>
@endforeach