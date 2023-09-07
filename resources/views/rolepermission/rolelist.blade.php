<h1>Role list:</h1>
<a href="{{route('rolestore')}}">Add a Role</a>
@foreach ($role as $r)
    <h3>{{$r->id}}:{{$r->name}}</h3>
@endforeach