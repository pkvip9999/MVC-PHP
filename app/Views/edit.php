<?php $this->loadView('layout/header'); ?>
    <div class="row">
    	<div class="col-sm-6">

        	<?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
            <?php endif; ?>
            
        	<form method="post">
            	<div class="form-group">
                	<label>Fullname</label>
                    <input type="text" name="full" class="form-control" placeholder="Fullname" value="<?= $user['user_fullname']; ?>" required />
                </div>
                
                <div class="form-group">
                	<label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password" value="<?= $user['user_password']; ?>" required />
                </div>
                <div class="form-group">
                	<label>Email</label>
                    <input type="text" name="mail" class="form-control" placeholder="Email"  value="<?= $user['user_email']; ?>" required />
                </div>
                <div class="form-group">
                	<label>Level</label>
                    <select name="level" class="form-control">
                    	<option value="1">Admin</option>
                        <option value="2">Mod</option>
                        <option value="3" selected="selected">User</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Sửa" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>

</body>
</html>
