<?php $__env->startSection('title', 'Requests'); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('companies.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Requests</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <?php echo e($request->user->name); ?> requests to join your company!
                                    <div>
                                        <div class="btn-toolbar">
                                            <?php if($request->pivot->state == 0): ?>
                                                <a href="<?php echo e(route('company.accept', ['companyPupil' => $request->pivot->id])); ?>" class="btn btn-primary" style="width: 100%;">Accept</a>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-success" style="width: 100%;" disabled>Accepted</button>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(!$request->pivot->state == 1): ?>
                                            <div class="btn-toolbar mt-2">
                                                <a href="<?php echo e(route('company.decline', ['companyPupil' => $request->pivot->id])); ?>" class="btn btn-danger" style="width: 100%;">Decline</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>