<?php $__env->startSection('title', 'Search'); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('pupils.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <form action="<?php echo e(route('pupil.searchView')); ?>" method="POST" class="form-inline my-2 justify-content-end">
                            <?php echo csrf_field(); ?>

                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <ul class="list-group">
                            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <?php echo e($company->name); ?>


                                    <?php if(count($company->company->pupils) > 0): ?>
                                        <?php $__currentLoopData = $company->company->pupils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pupil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($pupil->user_id == Auth::user()->id): ?>
                                                <?php if($pupil->pivot->state == 0): ?>
                                                    <button type="button" class="btn btn-warning" disabled>Applying...</button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-success" disabled>Applied</button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('pupil.apply', ['company' => $company->company->id])); ?>" class="btn btn-primary">Apply</a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="paginator mt-2 float-right">
                            <?php echo e($companies->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>