<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Subscribe')); ?></div>

                <div class="card-body">
                    <form action="<?php echo e(route('subscribe.store')); ?>" method="POST" id="paymentForm">
                        <?php echo csrf_field(); ?>
                        <div class="row mt-3">
                            <div class="col">
                                <label>
                                    Select your plan
                                </label>
                                <div class="form-group">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label
                                                class="btn btn-outline-secondary rounded m-2 p-3"
                                            >
                                                <input
                                                    type="radio"
                                                    name="plan"
                                                    value="<?php echo e($plan->slug); ?>"
                                                    required
                                                >
                                                <p class="h2 font-weight-bold text-capitalize">
                                                    <?php echo e($plan->slug); ?>

                                                </p>

                                                <p class="display-4 text-capitalize">
                                                    <?php echo e($plan->visual_price); ?>

                                                </p>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label>
                                    Select the desired payment platform
                                </label>
                                <div class="form-group" id="toggler">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <?php $__currentLoopData = $paymentPlatforms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentPlatform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label
                                                class="btn btn-outline-secondary rounded m-2 p-1"
                                                data-target="#<?php echo e($paymentPlatform->name); ?>Collapse"
                                                data-toggle="collapse"
                                            >
                                                <input
                                                    type="radio"
                                                    name="payment_platform"
                                                    value="<?php echo e($paymentPlatform->id); ?>"
                                                    required
                                                >
                                                <img class="img-thumbnail" src="<?php echo e(asset($paymentPlatform->image)); ?>" alt="">
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php $__currentLoopData = $paymentPlatforms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentPlatform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            id="<?php echo e($paymentPlatform->name); ?>Collapse"
                                            class="collapse"
                                            data-parent="#toggler"
                                        >
                                            <?php if ($__env->exists('components.' . strtolower($paymentPlatform->name) . '-collapse')) echo $__env->make('components.' . strtolower($paymentPlatform->name) . '-collapse', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-3">
                            <button type="submit" id="payButton" class="btn btn-primary btn-lg">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelPayment\resources\views/subscribe.blade.php ENDPATH**/ ?>