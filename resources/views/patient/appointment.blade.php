<x-admin.layout.patient_dashboard>
    <x-slot:title>Book Appointment</x-slot:title>

    <main style="margin-top: 58px">
        <div class="container pt-4">
            <a href="{{ route('appointment.list') }}" class="btn btn-danger fw-bold">Show all appointments</a>
            <div class="row">
                <form action="{{ route('appointment.store') }}" method="POST"
                      class="p-2 needs-validation" novalidate>
                    @csrf
                    <div class="card">
                        <div class="card-body py-5">
                            <div class="card-header">
                                <div class="row justify-content-center">
                                    <div class="col-9">
                                        <div class="justify-content-center mb-4"><h3 class="note note-success">Add
                                                Appoinment</h3></div>
                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control" name="test"
                                                   value="{{ $test->name ?? '' }}"
                                                   id="name" readonly required/>
                                            <label class="form-label" for="name">Test Name</label>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form1Example1"
                                                   class="form-control" name="price"
                                                   value="{{ $test->price ?? ''}}" readonly/>
                                            <label class="form-label " for="form1Example1">Test Price</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input name="phone" type="text" id="numberField"
                                                   value="{{ $user->phone ?? '' }}"
                                                   class="form-control" required/>
                                            <input name="user_id" value="{{ $user->id ?? ''}}" hidden></input>
                                            <input name="lab_id" value="{{ $lab->id ?? ''}}" hidden></input>
                                            <label class="form-label" for="form1Example1">Contact Number</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                                <textarea class="form-control" id="textAreaExample"
                                                          rows="3" name="address">{{ $user->address ?? '' }}
                                                </textarea>
                                            <label class="form-label"
                                                   for="address">Address</label>
                                        </div>
                                        <label class="form-label mb-4">Payment Type:</label>
                                        <div class="btn-group ">
                                            <input type="radio"
                                                   value="COD"
                                                   class="btn-check"
                                                   name="payment_type"
                                                   id="option1"
                                                   autocomplete="off"
                                                   onclick="cod();"
                                            />

                                            <label class="btn btn-secondary" for="option1">COD</label>

                                            <input type="radio"
                                                   value="Card"
                                                   class="btn-check"
                                                   name="payment_type"
                                                   id="myButton"
                                                   autocomplete="off"
                                                   onclick="card();"/ >
                                            <label class="btn btn-secondary" for="myButton">Card </label>
                                        </div>

                                        <div class="mt-4" style=" display: none;" id="div1">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <form accept-charset="UTF-8" action="/"
                                                          class="require-validation"
                                                          data-cc-on-file="false"
                                                          data-stripe-publishable-key="pk_test_51MDpdLHx2TAsiIqQn5IekS96v18RDBrRZQCmC9Ko8qXneYbgYtizUJ4zmq0dmqd0fM0XFLQbItnK4AaPwyJb9lOd00XrVEnPPA"
                                                          id="payment-form" method="post">
                                                        @csrf
                                                        <div class='form-row mb-4'>
                                                            <div class='col-xs-12 form-group required'>
                                                                <label class='control-label'></label> <input
                                                                    class='form-control' size='4' type='text'
                                                                    placeholder="Enter Card Holder Name">
                                                            </div>
                                                        </div>
                                                        <div class='form-row '>
                                                            <div class='col-xs-12 form-group card required'>
                                                                <label class='control-label'></label>
                                                                <label>
                                                                    <input

                                                                        maxlength="16"
                                                                        autocomplete='off'
                                                                        class='form-control card-number' size='20'
                                                                        type='text' placeholder="Enter Card number">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class='form-row'>
                                                            <div class='col-xs-4 form-group cvc required'>
                                                                <label class='control-label'></label> <input
                                                                    maxlength="3"
                                                                    autocomplete='off' class='form-control card-cvc'
                                                                    placeholder='CVV' size='4' type='text'>
                                                            </div>
                                                            <div class='col-xs-4 form-group expiration required'>
                                                                <label class='control-label'>Expiration</label>
                                                                <input
                                                                    maxlength="2"
                                                                    class='form-control card-expiry-month'
                                                                    placeholder='MM' size='2'
                                                                    type='text'>
                                                            </div>
                                                            <div class='col-xs-4 form-group expiration required'>
                                                                <label class='control-label'></label> <input
                                                                    maxlength="4"
                                                                    class='form-control card-expiry-year'
                                                                    placeholder='YYYY'
                                                                    size='4' type='text'>
                                                            </div>
                                                        </div>
                                                        <div class='form-row'>
                                                            <div class='mb-4 form-group'>
                                                                <button
                                                                    class='form-control btn btn-primary submit-button'
                                                                    type='submit' style="margin-top: 10px;">Pay
                                                                </button>
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
    <div>
        <a href="{{route('home')}}" class="btn btn-danger">
            Close
        </a>
        <button type="submit" class="btn btn-primary">Book</button>
    </div>
    </div>
    </div>
    </div>
    </form>
    </div>
    </main>
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"
            integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" lcrossorigin="anonymous"></script>
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
    <script>
        function card() {
            document.getElementById('div1').style.display = 'block';
        }

        function cod() {
            document.getElementById('div1').style.display = 'none';
        }
    </script>
</x-admin.layout.patient_dashboard>
