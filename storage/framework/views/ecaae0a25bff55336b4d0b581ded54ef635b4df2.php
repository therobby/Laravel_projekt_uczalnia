

<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block transparent">
    <div class="blured hard-blur"></div>
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong class="card-text center-message"><?php echo e($message); ?></strong>
</div>
<?php endif; ?>

<div class="alert justify-content-center">
    <div class="blured"></div>
    <div class="flex-row flex-center">
        <div class="card-text p4-lr"> 
            <select class="custom-select" id="shop-cat" onchange="categoryChange()">
                <option value="0">Wszystko</option>
            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat); ?>"><?php echo e($cat->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        
        <div class="card-text p4-lr">
            <button class="btn btn-primary" onclick="showCart()">Koszyk (<span id="cart-size">0</span>)</button>
        </div>
    </div>
</div>

<div id="shopping-cart"></div>

<div class="container">
    <div class="row justify-content-center">
        <div id="shop-products" class="col-md-8">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" name="<?php echo e($product['category']); ?>">
                <div class="blured"></div>
                <div class="card-header">
                    <div class="blured"></div>
                    <div class="flex-row">
                        <div class="card-text"><?php echo e($product['name']); ?></div>
                        <?php if(Auth::user() != null && Auth::user()->isAdmin()): ?>
                        <form method="POST" class="card-text flex-bottom-right" action="<?php echo e(route('adminDeleteProduct',$product['id'])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <input type="submit" onclick="deleteConfirm(event)" class="btn btn-danger" value="Usuń" />
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="flex-row">
                        <div class="card-text">
                            <img src="<?php echo e(URL::to('/')); ?>/images/<?php echo e($product['photo']); ?>" height="100" width="150" />
                        </div>
                        <div class="product-desc">
                            <div class="card-text">
                                <?php echo e($product['description']); ?>

                            </div>
                            <div class="bottom-price">
                                <button class="btn btn-success" onclick="addToCart(`<?php echo e($product['id']); ?>`, `<?php echo e($product['name']); ?>`, `<?php echo e($product['price']); ?>`)"><?php echo e($product['price']); ?> zł</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\otoczaki\resources\views/shop.blade.php ENDPATH**/ ?>