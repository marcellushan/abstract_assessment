
<h2 align="center">Inactive {{ucfirst($data_type)}}s</h2>
@forelse($inactives as $inactive)
    <div class="row">
        <div class="col-xs-10">
            {{$inactive->name}}
        </div>
        <div class="col-xs-1">
            <a href="{{$data_type}}/activate/{{$inactive->id}}" class="btn btn-danger" role="button">Activate</a>
        </div>
    </div>
    <br>
    @empty
        No Inactive {{ucfirst($data_type)}}s
@endforelse