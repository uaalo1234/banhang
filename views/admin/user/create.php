
<form method="POST" action="<?php echo url('admin/user/store') ?>">
    <div class="form-group">
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="" aria-describedby="helpId">
        <?php echo isset($errors['first_name']) ? $errors['first_name'] : ''; ?>
    </div>
    <div class="form-group">
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="" aria-describedby="helpId">
        <?php echo isset($errors['last_name']) ? $errors['last_name'] : ''; ?>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    <button type="button" class="btn btn-primary" onclick="history.go(-1)">Back</button>
</form>
