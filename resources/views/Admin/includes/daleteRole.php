<form action="Roledelete" method="post" class="card">
    <h3 align="center">Delete Role</h3>
    <div class="card-body">
        <p>Are you sure you what to Delete <?php echo $data['roles'] ?> Role?</p>
    </div>
    <div class="card-footer">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
        <input type="hidden" name="role" value="<?php echo $data['roles'] ?>">
        <button type="submit" name="deleteRole" class="btn btn-sm btn-danger">Delete</button>
    </div>
</form>