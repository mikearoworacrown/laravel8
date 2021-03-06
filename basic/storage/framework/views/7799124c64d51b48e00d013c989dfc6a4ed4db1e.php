<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
            <b style="float: right;">
            </b>
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?php echo e(session('success')); ?></strong>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        <?php endif; ?>

                        <div class="card-header">All Category</div>
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <!-- <?php ($i = 1); ?> -->
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            <th scope="row"> <?php echo e($categories->firstItem()+$loop->index); ?> </th>
                                            <td> <?php echo e($category->category_name); ?>  </td>
                                            <td> <?php echo e($category->user->name); ?> </td>
                                            <td><?php if($category->created_at == NULL): ?>
                                                <span class="text-danger">No date set</span>
                                                <?php else: ?>
                                                <?php echo e($category->created_at->diffForHumans()); ?> 
                                                <?php endif; ?>
                                            </td>
                                            <td> 
                                                <a href="<?php echo e(url('category/edit/'.$category->id)); ?>" class="btn btn-info">Edit</a>
                                                <a href="<?php echo e(url('softdelete/category/'.$category->id)); ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div style="padding-left: 5px; padding-right:5px;"><?php echo e($categories->links()); ?></div>
                    </div> 
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="<?php echo e(route('store.category')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">                            </div>
                                    <?php $__errorArgs = ['category_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </form>
                        </div>
                
                    </div> 
                </div>

            </div>
        </div>



<!-- TRASH PART -->

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">Trash List</div>
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <!-- <?php ($i = 1); ?> -->
                                        <?php $__currentLoopData = $trashCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            <th scope="row"> <?php echo e($categories->firstItem()+$loop->index); ?> </th>
                                            <td> <?php echo e($category->category_name); ?>  </td>
                                            <td> <?php echo e($category->user->name); ?> </td>
                                            <td><?php if($category->created_at == NULL): ?>
                                                <span class="text-danger">No date set</span>
                                                <?php else: ?>
                                                <?php echo e($category->created_at->diffForHumans()); ?> 
                                                <?php endif; ?>
                                            </td>
                                            <td> 
                                                <a href="<?php echo e(url('category/restore/'.$category->id)); ?>" class="btn btn-info">Restore</a>
                                                <a href="<?php echo e(url('pdelete/category/'.$category->id)); ?>" class="btn btn-danger">P Delete</a>
                                            </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            
                    </div> 
                </div>
                
                

            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/laravel8/basic/resources/views/admin/category/index.blade.php ENDPATH**/ ?>