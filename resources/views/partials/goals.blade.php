
<h2 align="center">Active {{ucfirst($data_type)}}s</h2>
@foreach($records as $record)
    <div class="row">
        <div class="col-sm-9">
            {{$record->name}}
        </div>
        <div class="col-sm-1">
            <a href="{{$data_type}}/{{$record->id}}/edit"  class="btn btn-warning" role="button">Edit</a>
        </div>
        <div class="col-sm-1">
            <a href="{{$data_type}}/deactivate/{{$record->id}}" class="btn btn-danger" role="button">Deactivate</a>
        </div>
    </div>
    <br>
@endforeach