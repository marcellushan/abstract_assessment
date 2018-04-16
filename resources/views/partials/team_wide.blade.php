
<h2 align="center">Active {{ucfirst($data_type)}}s</h2>
@foreach($records as $record)
    <div class="row">
        <div class="col-sm-2 col-sm-offset-3">
            <a href="{{$data_type}}/{{$record->id}}">{{$record->name}}
        </div>
        <div class="col-sm-2">
            <a href="{{$data_type}}/{{$record->id}}/edit"  class="btn btn-warning" role="button">Edit</a>
        </div>
        <div class="col-sm-2">
            @if($record->final)
            <a href="team/initial/{{$record->id}}"  class="btn btn-primary" role="button">Final</a>
            @else
            <a href="team/final/{{$record->id}}"  class="btn btn-info" role="button">Initial</a>
            @endif
        </div>
        <div class="col-sm-2">
            <a href="{{$data_type}}/deactivate/{{$record->id}}" class="btn btn-danger" role="button">Deactivate</a>
        </div>
    </div>
    <br>
@endforeach