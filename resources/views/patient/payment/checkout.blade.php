<x-admin.layout.patient_dashboard>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <div class="row justify-content-center">
                <div class="col-4">
                    <form accept-charset="UTF-8" action="/" class="require-validation"
                          data-cc-on-file="false"
                          data-stripe-publishable-key="pk_test_51MDpdLHx2TAsiIqQn5IekS96v18RDBrRZQCmC9Ko8qXneYbgYtizUJ4zmq0dmqd0fM0XFLQbItnK4AaPwyJb9lOd00XrVEnPPA"
                          id="payment-form" method="post">
                        @csrf
                        <div class='form-row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Card Holder Name</label> <input
                                    class='form-control' size='4' type='text' placeholder="Enter Card Holder Name">
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <label>
                                    <input
                                        autocomplete='off' class='form-control card-number' size='20'
                                        type='text' placeholder="Enter Card number">
                                </label>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-xs-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input
                                    autocomplete='off' class='form-control card-cvc'
                                    placeholder='CVV' size='4' type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required'>
                                <label class='control-label'>Expiration</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-4 form-group expiration required'>
                                <label class='control-label'>YEAR</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY'
                                    size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-12 form-group'>
                                <button class='form-control btn btn-primary submit-button'
                                        type='submit' style="margin-top: 10px;">Confirm
                                </button>
                                <a href="#" class='form-control btn btn-outline-danger submit-button'
                                   type='button' style="margin-top: 10px;">Cancel
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
                @if ((Session::has('success-message')))
                    <div class="alert alert-success col-md-12">{{
          Session::get('success-message') }}</div>
                @endif
            </div>
        </div>
        <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
        <script src="https://code.jquery.com/jquery-1.12.3.min.js"
                integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
                crossorigin="anonymous"></script>
        <script>
            $(function () {
                $('form.require-validation').bind('submit', function (e) {
                    var $form = $(e.target).closest('form'),
                        inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'].join(', '),
                        $inputs = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid = true;

                    $errorMessage.addClass('hide');
                    $('.has-error').removeClass('has-error');
                    $inputs.each(function (i, el) {
                        var $input = $(el);
                        if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault(); // cancel on first error
                        }
                    });
                });
            });

            $(function () {
                var $form = $("#payment-form");

                $form.on('submit', function (e) {
                    if (!$form.data('cc-on-file')) {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                    }
                });

                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text(response.error.message);
                    } else {
                        // token contains id, last4, and card type
                        var token = response['id'];
                        // insert the token into the form so it gets submitted to the server
                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        console.log(token);
                        $form.get(0).submit();
                        $form.reset();
                    }
                }
            })
        </script>
    </main>
</x-admin.layout.patient_dashboard>
