<div class="row" id = "{{$id or ''}}">
    <div class="col-sm-10">
        <div class="form-group">
            <h2>{{$label}}</h2>
            <textarea class="form-control" rows="5" name="{{$name}}">{{@$$record_type->$field}}</textarea>
        </div>
    </div>
</div>