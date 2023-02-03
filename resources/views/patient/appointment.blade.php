<x-admin.layout.patient_dashboard>
    <x-slot:title>Book Appointment</x-slot:title>
    <x-popup/>
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <a href="{{ route('appointment.list') }}" class="btn btn-danger fw-bold">Show all appointments</a>
            <div class="row">
                <form action="{{ route('stripe.book') }}" method="POST"
                      id="payment-form"
                      class="needs-validation" novalidate>
                    @csrf
                    <div class="card">
                        <div class="card-body py-5">
                            <div class="card-header">
                                <div class="row justify-content-center">
                                    <div class="col-9">
                                        <div class="justify-content-center mb-4"><h3 class="note note-success">
                                                Appoinment Details</h3></div>
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
                                                          rows="3" name="address">{{ $user->address ?? '' }}</textarea>
                                            <label class="form-label"
                                                   for="address">Address</label>
                                        </div>
                                        <div>
                                            <b>Select Payment Method</b>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="payment_type"
                                                   id="cash" value="cash" checked/>
                                            <label class="form-check-label" for="inlineRadio1">Cash</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-4">
                                            <input class="form-check-input" type="radio" name="payment_type"
                                                   id="card" value="card"/>
                                            <label class="form-check-label" for="inlineRadio2">Card</label>
                                        </div>
                                        <div id="div-card">
                                            <div class="form-outline mb-4">
                                                <input type="text" id="card-holder-name" class="form-control">
                                                <label for="card-holder-name" class="form-label">Card Holder
                                                    Name</label>
                                            </div>
                                            <div id="card-element" class="rounded-2 border py-2 px-1">
                                                <!-- A Stripe Element will be inserted here. -->
                                            </div>

                                            <!-- Used to display form errors. -->
                                            <div id="card-errors" class="text-muted mb-5"></div>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit"
                                                    class="btn btn-primary btn-block bg-gradient-blue fw-bold">
                                                Book Appointment
                                            </button>
                                            <a href="{{ route('home') }}"
                                               class="btn btn-secondary btn-block fw-bold mt-4">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
    </main>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51MDpdLHx2TAsiIqQn5IekS96v18RDBrRZQCmC9Ko8qXneYbgYtizUJ4zmq0dmqd0fM0XFLQbItnK4AaPwyJb9lOd00XrVEnPPA');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            if ($('#cash').is(':checked')) {
                form.submit();
                return;
            }
            stripe.createPaymentMethod('card', card, {
                billing_details: {
                    name: document.getElementById('card-holder-name').value,
                }
            }).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripePaymentMethodHandler(result.paymentMethod);
                }
            });
        });

        // Submit the form with the paymentMethod ID.
        function stripePaymentMethodHandler(paymentMethod) {
            $('button[type="submit"]').prop('disabled', true);
            $('button[type="submit"]').html('<i class="fa fa-spinner fa-spin fa-2x"> </i>');

            // Insert the token ID into the form, so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);
            form.submit();
        }

        // hide card div if cash is selected
        $('#cash').on('click', function () {
            $('#div-card').hide();
        });

        // show card div if card is selected
        $('#card').on('click', function () {
            $('#div-card').show();
        });
        $('#div-card').hide();
    </script>
</x-admin.layout.patient_dashboard>
