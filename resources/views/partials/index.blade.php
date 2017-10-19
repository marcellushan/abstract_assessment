{{--<h2 align="center">{{ucfirst($data_type)}}s</h2>--}}
@foreach($records as $record)
    <div class="row">
        <div class="col-md-2 col-md-offset-4">
            <a href="{{$data_type}}/{{$record->id}}">{{$record->name}}</a>
        </div>
        <div class="col-md-2">
            <a href="{{$data_type}}/{{$record->id}}/edit">Edit</a>
        </div>
        <div class="col-md-2">
            {{Form::open(['action' => [ucfirst($data_type) . 'Controller@destroy', $record->id],  'method' => 'delete'])}}
            <button type="submit" class="btn btn-danger">Delete</button>
            {{Form::close()}}
        </div>
    </div>
    <br>
@endforeach