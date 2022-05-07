<?php $__env->startPush('styles'); ?>
<style type="text/css">
    .StripeElement {
      box-sizing: border-box;
      height: 40px;
      padding: 10px 12px;
      border: 1px solid transparent;
      border-radius: 4px;
      background-color: white;
      box-shadow: 0 1px 3px 0 #e6ebf1;
      -webkit-transition: box-shadow 150ms ease;
      transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
      box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
      border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
      background-color: #fefde5 !important;
    }
</style>
<?php $__env->stopPush(); ?>
<label class="mt-3" for="card-element">
    Card details:
</label>

<div id="cardElement"></div>

<small class="form-text text-muted" id="cardErrors" role="alert"></small>

<input type="hidden" name="payment_method" id="paymentMethod">

<?php $__env->startPush('scripts'); ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('<?php echo e(config('services.stripe.key')); ?>');
    const elements = stripe.elements({ locale: 'en' });
    const cardElement = elements.create('card');
    cardElement.mount('#cardElement');
</script>

<script>
    const form = document.getElementById('paymentForm');
    const payButton = document.getElementById('payButton');
    payButton.addEventListener('click', async(e) => {
        if (form.elements.payment_platform.value === "<?php echo e($paymentPlatform->id); ?>") {
            e.preventDefault();
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {
                        "name": "<?php echo e(auth()->user()->name); ?>",
                        "email": "<?php echo e(auth()->user()->email); ?>"
                    }
                }
            );
            if (error) {
                const displayError = document.getElementById('cardErrors');
                displayError.textContent = error.message;
            } else {
                const tokenInput = document.getElementById('paymentMethod');
                tokenInput.value = paymentMethod.id;
                form.submit();
            }
        }
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\LaravelPayment\resources\views/components/stripe-collapse.blade.php ENDPATH**/ ?>