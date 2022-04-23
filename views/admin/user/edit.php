<form method="POST" action="<?php echo url('admin/user/update', ['id' => $user['id']])?>">
    <div class="form-group">
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" 
        class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $user['first_name']?>">
        <?php echo isset($errors) ? $errors['first_name'] : '' ?>

    </div>
    <div class="form-group">
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" 
        placeholder="" aria-describedby="helpId" value="<?php echo $user['last_name']?>">
        <?php echo isset($errors) ? $errors['last_name'] : '' ?>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <button type="button" class="btn btn-primary" onclick="history.go(-1)">Back</button>
</form>