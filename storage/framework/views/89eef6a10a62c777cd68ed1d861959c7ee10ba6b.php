

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
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="blured"></div>
                <div class="card-header">
                    <div class="blured"></div>
                    <div class="flex-row">
                        <div class="card-text"><?php echo e($product->name); ?></div>
                        <form method="POST" class="card-text flex-bottom-right" action="<?php echo e(route('adminDeleteProduct',$product->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="submit" class="btn btn-danger" value="Usuń" />
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="flex-row">
                        <div class="card-text">
                            <img src="<?php echo e(URL::to('/')); ?>/images/<?php echo e($product->photo); ?>" height="100" width="150" />
                        </div>
                        <div class="product-desc">
                            <div class="card-text">
                                <?php echo e($product->description); ?>

                            </div>
                            <div class="bottom-price">
                                <?php echo e($product->price); ?> zł
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="blured"></div>
                <div class="card-header">
                    <div class="blured"></div>
                    <div class="card-text">Dodaj produkty!</div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <a class="btn btn-primary" href="<?php echo e(route('adminAddProductView')); ?>">Dodaj</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\otoczaki\resources\views/admin/adminProductList.blade.php ENDPATH**/ ?>