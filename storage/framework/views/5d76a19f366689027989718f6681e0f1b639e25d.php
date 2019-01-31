<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('teachers.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Name</td>
                                <td><?php echo e($user->name); ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo e($user->email); ?></td>
                            </tr>
                            <tr>
                                <td>School</td>
                                <td><?php echo e($profile->school_name); ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-right mb-0">
                            <a href="<?php echo e(route('teacher.profileEdit')); ?>" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>