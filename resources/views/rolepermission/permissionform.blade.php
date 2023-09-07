
  
<form method="POST" action="{{route('permissionstore')}}">
    @csrf
    <div class="form-group">
      <label >Add Permission</label>
    </div>
    <div class="form-group">
      <label >Permission</label>
      <input type="text" class="form-control" name="permission" placeholder="permission">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

