<h1>permission list:</h1>
<a href="{{route('permissionstore')}}">Add a Permission</a>
@foreach ($permission as $p)
    <h3>{{$p->id}}:{{$p->name}}</h3>
@endforeach