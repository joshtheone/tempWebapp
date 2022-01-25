<form action="deleteRole" method="post" class="card">
    <h3 align="center">Edit Role</h3>
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputBorder">Role Name </label>
            <input type="text" class="form-control form-control-border" name="role" value="<?php echo $data['roles'] ?>"  placeholder="Enter Role Name..">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" name="deleteRole" class="btn btn-sm btn-info">save</button>
    </div>
</form>