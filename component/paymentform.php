<!-- Card -->
<!--<div class="card  mb-3 mb-lg-0">-->
<!--     Card Header -->
<!--    <div class="card-header">-->
<!--        <h3 class="mb-0">Payment Method</h3>-->
<!--    </div>-->
<!--     Card Body -->
<!--    <div class="card-body">-->
<!--        <div class="d-inline-flex ">-->
<!--            <div class="form-check me-3  ">-->
<!--                <input type="radio" id="cardRadioone" name="cardRadioone" class="form-check-input" checked>-->
<!--                <label class="form-check-label " for="cardRadioone">Credit-->
<!--                    or Debit card</label>-->
<!--            </div>-->
<!--             Radio -->
<!--            <div class="form-check">-->
<!--                <input type="radio" id="cardRadioTwo" name="cardRadioone" class="form-check-input">-->
<!--                <label class="form-check-label" for="cardRadioTwo">PayPal</label>-->
<!--            </div>-->
<!--        </div>-->
        <!-- Form -->
<!--        <form class="row " id="cardpayment">-->
            <!-- Card number -->
<!--            <div class="mb-3 mt-4 col-12">-->
                <!-- Card Number -->
<!--                <label class="d-flex justify-content-between align-items-center form-label" for="cc-mask">Card-->
<!--                    Number <span><i class="fab fa-cc-amex me-1  text-primary"></i><i-->
<!--                            class="fab fa-cc-mastercard me-1  text-primary"></i> <i-->
<!--                            class="fab fa-cc-discover me-1  text-primary"></i> <i-->
<!--                            class="fab fa-cc-visa  text-primary"></i></span></label>-->
<!--                <div class="input-group">-->
<!--                    <input type="text" class="form-control" id="cc-mask" data-inputmask="'mask': '9999 9999 9999 9999'"-->
<!--                           inputmode="numeric" placeholder="xxxx-xxxx-xxxx-xxxx" required />-->
<!--                    <span class="input-group-text" id="basic-addon2"><i class="fe fe-lock "></i></span>-->
<!---->
<!--                </div>-->
<!--                <small class="text-muted">Full name as displayed on card.</small>-->
<!--            </div>-->
            <!-- Month -->
<!--            <div class="mb-3 col-12 col-md-4">-->
<!--                <label class="form-label">Month</label>-->
<!--                <select class="selectpicker" data-width="100%">-->
<!--                    <option value="">Month</option>-->
<!--                    <option value="June">June</option>-->
<!--                    <option value="July">July</option>-->
<!--                    <option value="August">August</option>-->
<!--                    <option value="Sep">Sep</option>-->
<!--                    <option value="Oct">Oct</option>-->
<!--                </select>-->
<!--            </div>-->
<!--            Year -->
<!--            <div class="mb-3 col-12 col-md-4">-->
<!--                <label class="form-label">Year</label>-->
<!--                <select class="selectpicker" data-width="100%">-->
<!--                    <option value="">Year</option>-->
<!--                    <option value="June">2018</option>-->
<!--                    <option value="July">2019</option>-->
<!--                    <option value="August">2020</option>-->
<!--                    <option value="Sep">2021</option>-->
<!--                    <option value="Oct">2022</option>-->
<!--                </select>-->
<!--            </div>-->
            <!-- CVV Code -->
<!--            <div class="mb-3 col-12 col-md-4">-->
<!--                <label for="cvv" class="form-label">CVV Code <i class="fe fe-help-circle ms-1 fs-6" data-bs-toggle="tooltip"-->
<!--                                                                data-placement="right" title=""-->
<!--                                                                data-original-title="A 3 - digit number, typically printed on the back of a card."></i></label>-->
<!--                <input type="password" class="cc-inputmask form-control" name="cvv" id="cvv"  placeholder="xxx"-->
<!--                       maxlength="3">-->
<!--            </div>-->
            <!-- Name on card -->
<!--            <div class="mb-3 col-12">-->
<!--                <label for="nameoncard" class="form-label">Name on Card</label>-->
<!--                <input id="nameoncard" type="text" class="form-control" name="nameoncard" placeholder="Name" required>-->
<!--            </div>-->
            <!-- Country -->
<!--            <div class="mb-3 col-6">-->
<!--                <label class="form-label">Country</label>-->
<!--                <select class="selectpicker" data-width="100%">-->
<!--                    <option value="">India</option>-->
<!--                    <option value="uk">UK</option>-->
<!--                    <option value="usa">USA</option>-->
<!--                </select>-->
<!--            </div>-->
<!--             Zip Code -->
<!--            <div class="mb-3 col-6">-->
<!--                <label for="postalcode" class="form-label">Zip/Postal Code</label>-->
<!--                <input id="postalcode" type="text" class="form-control" name="postalcode" placeholder="Zipcode"-->
<!--                       required>-->
<!--            </div>-->
<!--             CheckBox -->
<!--            <div class="col-12 mb-5">-->
<!--                <div class="form-check">-->
<!--                    <input type="checkbox" class="form-check-input" id="customCheck1">-->
<!--                    <label class="form-check-label " for="customCheck1">Remember this-->
<!--                        card</label>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 col-12">-->
<!--                 Button -->
<!--                <div>-->
<!--                    <button type="submit" class="btn btn-primary mb-3 mb-lg-0 me-4">Make a-->
<!--                        Payment</button>-->
<!--                </div>-->
<!--            </div>-->
            <!-- Text -->
<!--            <div class="col-md-8 col-12 d-flex align-items-center justify-content-end">-->
<!--                <small class="mb-0">By click start learning, you agree to our <a href="#">Terms of-->
<!--                        Service and Privacy Policy.</a></small>-->
<!--            </div>-->
<!--        </form>-->
        <!-- Paypal -->
<!--        <form id="internetpayment">-->
<!--            <div class="mb-3 mt-4 ">-->
<!--                <label for="paypalemail" class="form-label">PayPal</label>-->
<!--                <input type="email" id="paypalemail" name="paypalemail" placeholder="Enter your PayPal email"-->
<!--                       class="form-control" required>-->
<!--            </div>-->
<!--            <button type="submit" class="btn btn-primary">PayPal Checkout</button>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->

<form>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button type="button" onclick="payWithPaystack()"> Pay </button>
</form>
