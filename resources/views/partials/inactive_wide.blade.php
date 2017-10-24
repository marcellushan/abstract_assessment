
<h2>Inactive {{ucfirst($data_type)}}s</h2>
@forelse($inactives as $inactive)
    <div class="row">
        <div class="col-md-8">
            {{$inactive->name}}
        </div>
        <div class="col-md-2">
            <a href="{{$data_type}}/activate/{{$inactive->id}}" class="btn btn-danger" role="button">Activate</a>
        </div>
    </div>
    <br>
    @empty
        No Inactive {{ucfirst($data_type)}}s
@endforelse