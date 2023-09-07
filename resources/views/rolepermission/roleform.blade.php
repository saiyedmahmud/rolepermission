
  
<form method="POST" action="{{route('rolestore')}}">
    @csrf
    <div class="form-group">
      <label >Add Role</label>
    </div>
    <div class="form-group">
      <label >Role</label>
      <input type="text" class="form-control" name="role" placeholder="Role">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

