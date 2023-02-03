<div class="container" style="padding-top: 5px">
    <div class=''>
        <div class='row justify-content-center'>
            <div class='col-0'></div>
            <div class='col-9'>
                <div class="justify-content-center mb-4"><h3 class="note note-success"> Payment Details</h3></div>
                <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                <form accept-charset="UTF-8" action="/pay" class="require-validation"
                      data-cc-on-file="false"
                      data-stripe-publishable-key="pk_test_51MDpdLHx2TAsiIqQn5IekS96v18RDBrRZQCmC9Ko8qXneYbgYtizUJ4zmq0dmqd0fM0XFLQbItnK4AaPwyJb9lOd00XrVEnPPA"
                      id="payment-form" method="post">
                    @csrf
                    <div class='form-row'>
                        <div class='col-xs-12 form-group required'>
                            <input
                                class='form-control mb-4' size='4' type='text'
                                placeholder="Enter Card Holder Name">
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-xs-12 mb-4 form-group card required '>
                            <input
                                maxlength="16"
                                autocomplete='off' class='form-control card-number' size='20'
                                type='text' placeholder="Enter Card number">
                        </div>
                    </div>

                    <div class='form-row'>
                        <div class='col-xs-4 form-group cvc required'>
                            <input
                                maxlength="3"
                                autocomplete='off' class='form-control card-cvc'
                                placeholder='CVV' size='4' type='text'>
                        </div>
                        <div class='col-xs-4 mb-4 form-group expiration required'>
                            <label class='control-label'>Expiration</label> <input
                                maxlength="2"
                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                type='text'>
                        </div>
                        <div class='col-xs-4 form-group expiration required mb-4'>
                            <input
                                maxlength="4"
                                class='form-control card-expiry-year' placeholder='YYYY'
                                size='4' type='text'>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='col-md-12 form-group mb-4'>
                            <button class='form-control btn btn-primary submit-button'
                                    type='submit'><i class="fa fa-lock"></i> Pay
                            </button>
                        </div>
                    </div>
                </form>
                @if ((Session::has('success-message')))
                    <div class="alert alert-success col-md-12">{{
                  Session::get('success-message') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"
        integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
        crossorigin="anonymous"></script>
<script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
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
            console.log(response);

            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    })
</script>

