<?php $__env->startSection('admin'); ?>


    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        

                        <div class="card-header">All Brand</div>
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <!-- <?php ($i = 1); ?> -->
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            <th scope="row"> <?php echo e($brands->firstItem()+$loop->index); ?> </th>
                                            <td> <?php echo e($brand->brand_name); ?>  </td>
                                            <td> <img src="<?php echo e(asset($brand->brand_image)); ?>" style="height:40px; width:60px;"> </td>
                                            <td><?php if($brand->created_at == NULL): ?>
                                                <span class="text-danger">No date set</span>
                                                <?php else: ?>
                                                <?php echo e($brand->created_at->diffForHumans()); ?> 
                                                <?php endif; ?>
                                            </td>
                                            <td> 
                                                <a href="<?php echo e(url('brand/edit/'.$brand->id)); ?>" class="btn btn-info">Edit</a>
                                                <a href="<?php echo e(url('brand/delete/'.$brand->id)); ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                                            </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div style="padding-left: 5px; padding-right:5px;"><?php echo e($brands->links()); ?></div>
                    </div> 
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                            <form action="<?php echo e(route('store.brand')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" aria-describedby="emailHelp">
                                    <?php $__errorArgs = ['brand_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image" aria-describedby="emailHelp">
                                    <?php $__errorArgs = ['brand_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                
                    </div> 
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel8/basic/resources/views/admin/brand/index.blade.php ENDPATH**/ ?>