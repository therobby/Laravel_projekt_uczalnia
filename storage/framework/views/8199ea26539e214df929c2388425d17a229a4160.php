

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
                        <div class="card-text">Dodaj produkt</div>
                        <div class="flex-bottom-right"><a class="btn btn-primary card-text " href="<?php echo e(route('admin')); ?>">Wróć</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('adminAddProduct')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Kategoria:</label>
                            <div class="col-md-6">
                                <select id="category" name="category" required>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(array_search($cat, $category) + 1); ?>"><?php echo e($cat); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Opis</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Cena</label>
                            <div class="col-md-6">
                                <input id="price" type="number" min="0.00" step="0.01" class="form-control" name="price" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">Zdjęcie</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control" name="photo" required />
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Dodaj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\otoczaki\resources\views/admin/adminAddProduct.blade.php ENDPATH**/ ?>