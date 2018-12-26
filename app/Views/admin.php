<?php $this->loadView('layout/header'); ?>


    <div class="row">
    	<div class="col-sm-12">

            <?php if (isset($_SESSION['success'])) { ?>
        	<div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
            <?php unset($_SESSION['success']); ?>
            <?php } ?>

        	<table class="table table-striped">
            	<tr id="tbl-first-row">
                	<td width="5%">#</td>
                    <td width="30%">Fullname</td>
                    <td width="25%">Email</td>
                    <td width="5%">Edit</td>
                    <td width="5%">Delete</td>
                </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                	<td><?= $user['user_id'];  ?></td>
                    <td><?= $user['user_fullname'];  ?></td>
                    <td><?= $user['user_email'];  ?></td>
                    <td><a href="index.php?controller=admin&action=edit&id=<?= $user['user_id'] ?>">Edit</a></td>
                    <td><a href="index.php?controller=admin&action=delete&id=<?= $user['user_id'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>

               
			</table>
            <div aria-label="Page navigation">
            	<ul class="pagination">
                	<?= $page; ?>

                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
