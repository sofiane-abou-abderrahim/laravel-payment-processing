<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Make a payment')); ?></div>

                <div class="card-body">
                    <form action="<?php echo e(route('pay')); ?>" method="POST" id="paymentForm">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-auto">
                                <label>How much do you want to pay?</label>
                                <input
                                    type="number"
                                    min="5"
                                    step="0.01"
                                    class="form-control"
                                    name="value"
                                    value="<?php echo e(mt_rand(500, 100000) / 100); ?>"
                                    required
                                >
                                <small class="form-text text-muted">
                                    Use values with up to two decimal positions, using a dot "."
                                </small>
                            </div>
                            <div class="col-auto">
                                <label>Currency</label>
                                <select class="custom-select" name="currency" required>
                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($currency->iso); ?>">
                                            <?php echo e(strtoupper($currency->iso)); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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
                        <div class="row">
                            <div class="col-auto">
                                <p class="border-bottom border-primary rounded">
                                    <?php if(! optional(auth()->user())->hasActiveSubscription()): ?>
                                        Would you like a discount every time?
                                        <a href="<?php echo e(route('subscribe.show')); ?>">Subscribe</a>
                                    <?php else: ?>
                                        You get a <span class="font-weight-bold">10% off</span> as part of your subscription (this will be applied in the checkout).
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelPayment\resources\views/home.blade.php ENDPATH**/ ?>