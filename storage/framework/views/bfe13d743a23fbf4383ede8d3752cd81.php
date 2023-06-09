<?php $__env->startSection('content'); ?>
   <main class="content">
       <h1 class="h3 mb-3"><strong>Edit</strong> User</h1>
       <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-body">
                       <form action="<?php echo e(route('users.update', $user->id)); ?>" method="post">
                           <?php echo method_field('PUT'); ?>
                           <?php echo csrf_field(); ?>
                           <label for="example-text-input" class="form-control-label">Name</label>
                           <input name="name" type="text" class="form-control mb-3" value="<?php echo e($user->name); ?>">
                           <label for="example-text-input" class="form-control-label">Email</label>
                           <input name="email" class="form-control mb-3" type="email" value="<?php echo e($user->email); ?>">
                           <p class="form-control-label">Roles:</p>
                           <div class="row">
                               <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="col-md-2">
                                       <div class="form-check">
                                           <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                                                  <?php if( in_array($id, $user->roles->pluck('id')->toArray())): ?> checked
                                                  <?php endif; ?> class="form-check ms-2" name="roles[]"
                                                  value="<?php echo e($id); ?>">
                                           <label class="form-check-label" for="flexCheckDefault">
                                               <h4>
                                                <span class="badge bg-warning rounded-pill">
                                                    <?php echo e($role); ?>

                                                </span>
                                               </h4>
                                           </label>
                                       </div>
                                   </div>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                           <button type="submit" class="btn btn-success mt-3">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                   <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                               </svg>
                               Update
                           </button>
                           <a class="btn btn-secondary mt-3"  href="<?php echo e(route('users.index')); ?>">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                   <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                               </svg>
                               Back
                           </a>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webteam5/admin/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>