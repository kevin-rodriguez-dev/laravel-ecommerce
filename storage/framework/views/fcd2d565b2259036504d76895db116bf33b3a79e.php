<?php $__env->startSection('title'); ?> <?php echo e(__('pages.product')); ?>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <form action="<?php echo e(route('product.store')); ?>" method="post" enctype="multipart/form-data" data-parsley-validate>
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 rounded-0">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('pages.create_product')); ?></h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('pages.product_title')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" placeholder="<?php echo e(__('pages.product_title')); ?>" class="form-control">
                                        <?php if($errors->has('title')): ?>
                                            <div class="error"><?php echo e($errors->first('title')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sku"><?php echo e(__('pages.sku_or_product_code')); ?> <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3 ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text rounded-0"><?php echo e(get_option('purchase_invoice_prefix')); ?></span>
                                            </div>
                                            <input type="text" name="sku" id="sku" value="<?php echo e(old('sku') ? old('sku') : $new_sku); ?>" maxlength="15" placeholder="<?php echo e(__('pages.sku_or_product_code')); ?>" class="form-control">
                                            <?php if($errors->has('sku')): ?>
                                                <div class="error"><?php echo e($errors->first('sku')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category"><?php echo e(__('pages.category')); ?> <span class="text-danger">*</span></label>
                                        <select name="category_id" id="category" class="form-control select2">
                                            <option value=""><?php echo e(__('pages.select_one')); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('category_id')): ?>
                                            <div class="error"><?php echo e($errors->first('category_id')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="purchase_price"><?php echo e(__('pages.purchase_price')); ?> <span class="text-danger">*</span></label>
                                        <input type="number" step=".1" name="purchase_price" min="0" id="purchase_price" value="<?php echo e(old('purchase_price')); ?>" placeholder="<?php echo e(__('pages.purchase_price')); ?>" class="form-control">
                                        <?php if($errors->has('purchase_price')): ?>
                                            <div class="error"><?php echo e($errors->first('purchase_price')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sell_price"><?php echo e(__('pages.sell_price')); ?> <span class="text-danger">*</span></label>
                                        <input type="number" step=".1" min="0" name="sell_price" id="sell_price" value="<?php echo e(old('sell_price')); ?>" placeholder="<?php echo e(__('pages.sell_price')); ?>" class="form-control">
                                        <?php if($errors->has('sell_price')): ?>
                                            <div class="error"><?php echo e($errors->first('sell_price')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price_type"><?php echo e(__('pages.sell_price_type')); ?> <span class="text-danger">*</span></label>
                                        <select name="price_type" id="price_type" class="form-control select2">
                                            <option value="1">Fixed</option>
                                            <option value="2">Negotiable</option>
                                        </select>

                                        <?php if($errors->has('price_type')): ?>
                                            <div class="error"><?php echo e($errors->first('price_type')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tax_id"><?php echo e(__('pages.tax')); ?> <span class="text-danger">*</span></label>
                                        <select name="tax_id" id="tax_id" class="form-control select2">
                                            <option value=""><?php echo e(__('pages.select_one')); ?></option>
                                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tax->id); ?>" <?php echo e(old('tax_id') == $tax->id ? 'selected' : ''); ?>><?php echo e($tax->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('tax_id')): ?>
                                            <div class="error"><?php echo e($errors->first('tax_id')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_description"><?php echo e(__('pages.short_description')); ?></label>
                                        <textarea name="short_description" id="short_descriptionress" value="<?php echo e(old('short_description')); ?>" class="form-control" placeholder="Short Description"></textarea>
                                        <?php if($errors->has('short_description')): ?>
                                            <div class="error"><?php echo e($errors->first('short_description')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <!-- image preview ------>
                                        <div class="upload-img-box">
                                            <img src="">
                                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" onchange="previewFile(this)">
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                                <p class="m-0">Add Image</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12 pull-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('pages.save')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('/backend/js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\mbpos\resources\views/backend/product/create.blade.php ENDPATH**/ ?>