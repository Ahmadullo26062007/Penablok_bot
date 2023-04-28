<?php $__env->startSection('content'); ?>
   <main class="content">
       <h1 class="h3 mb-3"><strong>Create</strong> User</h1>
       <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-body">
                       <form action="<?php echo e(route('users.store')); ?>" method="post">
                           <?php if($errors->any()): ?>
                               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="alert alert-danger" role="alert">
                                       <?php echo e($error); ?>

                                   </div>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                           <?php echo csrf_field(); ?>
                           <div class="mb-3">
                               <label for="name" class="form-label">Name</label>
                               <input type="text" name="name" class="form-control" id="name">
                           </div>
                           <div class="mb-3">
                               <label for="email" class="form-label">Email</label>
                               <input type="Email" name="email" class="form-control" id="email">
                           </div>
                           <div class="mb-3">
                               <label for="password" class="form-label">Password</label>
                               <input type="password" name="password" class="form-control" id="password">
                           </div>
                           <p class="form-control-label">Roles:</p>
                           <div >
                               <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="col-md-2">
                                       <div class="form-check">
                                           <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="roles[]" value="<?php echo e($id); ?>">
                                           <label class="form-check-label" for="flexCheckDefault">
                                               <h4>
                                               <span class="badge bg-success rounded-pill">
                                                    <?php echo e($role); ?>

                                               </span>
                                               </h4>
                                           </label>
                                       </div>
                                   </div>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                           <button class="btn btn-primary mt-3" type="submit">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                   <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                   <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                               </svg>
                               Create
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webteam5/admin/resources/views/admin/users/create.blade.php ENDPATH**/ ?>