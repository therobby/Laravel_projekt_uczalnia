

<?php $__env->startSection('content'); ?>
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block transparent">
    <div class="blured hard-blur"></div>
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="card-text center-message"><?php echo e($message); ?></strong>
</div>
<?php endif; ?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="blured"></div>
                <div class="card-header">
                    <div class="blured"></div>
                    <div class="flex-row">
                        <div class="card-text">Użytkownicy</div>
                        <div class="flex-bottom-right"><a class="btn btn-primary card-text " href="<?php echo e(route('admin')); ?>">Wróć</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="flex-row">
                        <div class="card-text">
                            <table>
                                <thead>
                                    <th>Nazwa</th>
                                    <th>Email</th>
                                    <th>Ban</th>
                                    <th>Data utworzenia</th>
                                    <th></th>
                                </thead>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <form method="post" action="<?php echo e(route('adminBanUser')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($user->id); ?>" name="id"></input>
                                            <?php if($user->banned == 0): ?>
                                            <input type="hidden" value="0" name="banned"></input>
                                            <input type="submit" class="btn btn-danger" value="Zbanuj"></input>
                                            <?php else: ?>
                                            <input type="hidden" value="1" name="banned"></input>
                                            <input type="submit" class="btn btn-success" value="Odbanuj"></input>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                    <td><?php echo e($user->created_at); ?></td>
                                    <td>
                                        <form method="post" action="<?php echo e(route('delUser')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($user->id); ?>" name="id"></input>
                                            <input type="submit" class="btn btn-danger" value="Usuń"></input>
                                        </form>
                                    </td>
                                </tbody>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\otoczaki\resources\views/admin/userslist.blade.php ENDPATH**/ ?>