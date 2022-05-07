

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Complete the security steps</div>

                <div class="card-body">
                    <p>You need to follow some steps with your bank to complete this payment. Let's go!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('<?php echo e(config('services.stripe.key')); ?>');
    stripe.confirmCardPayment(
        "<?php echo e($clientSecret); ?>",
        {payment_method: "<?php echo e($paymentMethod); ?>"}
    )
    .then(function(result) {
            if (result.error) {
                window.location.replace("<?php echo e(route('subscribe.cancelled')); ?>");
            } else {
                window.location.replace("<?php echo route('subscribe.approval', [
                    'plan' => $plan,
                    'subscription_id' => $subscriptionId,
                ]); ?>");
            }
        });
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\LaravelPayment\resources\views/stripe/3d-secure-subscription.blade.php ENDPATH**/ ?>