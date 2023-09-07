<!DOCTYPE html>
<html>
<head>
    <title>Select Role</title>
</head>
<body>
    <form method="POST" action="{{route('assignstore')}}">
        @csrf
        <label for="role">Select a Role:</label>
        <select id="role" name="role">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <select id="role" name="permission">
            @foreach($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>


</body>
</html>
