@extends('layouts.main')
@section('content')
    <div class="container my-5">
        <div class="row book-form">
            <div class="col-md-7  col-lg-8 col-sm-12 order-md-1 order-2">
                <div class="p-lg-5 p-3 bg-white shadow ">

                    <form action="{{ route('book.submit') }}" method="POST">
                        @csrf
                        <h3>Booking Form</h3>


                        {{-- <h3>Traveller Details</h3> --}}
                        <div class="form-row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <div class="custom_select">
                                        <select id="title" name="title" class="form-control">
                                            <option value="Mr." selected="">Mr.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Dr.">Dr.</option>
                                        </select>
                                    </div>
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="f_name">First Name<span>*</span></label>
                                    <input type="text" class="form-control" placeholder="First Name" name="f_name"
                                        id="f_name" value="" required="">
                                    @error('f_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="l_name">Last Name<span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="l_name"
                                        id="l_name" value="" required="">
                                    @error('l_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email<span>*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" required=""
                                        placeholder="Email" value="">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="country">Country<span>*</span></label>
                                    <div class="custom_select">
                                        <x-country-select />
                                    </div>
                                    @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                        <div class="form-row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="country_code">Country Code *</label>
                                    <input type="text" name="country_code" id="country_code" class="form-control"
                                        placeholder="Country Code" required>
                                    @error('country_code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="phone">Phone Number *</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Phone Number" required>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h3>Date & Travel Details</h3>

                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="datepicker">Start Date<span>*</span></label>
                                    <div class="calendar">
                                        <input type="date" class="form-control" style="background-color:#fff;" required
                                            @isset($date) value="{{ $date }}" @endisset
                                            id="start_date" name="start_date" autocomplete="off" data-type="date"
                                            placeholder="Start Date">
                                    </div>
                                    @error('start_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="people">No. of People<span>*</span></label>
                                    <div class="people-calculation">
                                        <div class="increment_decrement">
                                            <input type="number" class="form-control" name="people" id="peoples"
                                                @isset($guest) value="{{ $guest }}" @endisset
                                                data-input-type="incrementer" oninput="calculateTotal()" min="1">
                                        </div>
                                    </div>
                                    @error('people')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="pickup_details">Pickup Details</label>
                            <textarea name="pickup_details" id="pickup_details" rows="4" class="form-control"
                                placeholder="Pickup Details"></textarea>
                            @error('pickup_details')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="comments">Extra Requirements</label>
                            <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Extra Requirements"></textarea>
                            @error('comments')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" required id="terms"
                                    name="terms" value="1">
                                <label class="custom-control-label" for="terms">I accept terms and conditions
                                    <a href="javascript:void(0);" id="termsandcondition"><i
                                            class="fa fa-question-circle"></i></a>
                                </label>
                            </div>
                            @error('terms')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary" value="submit" name="submit" type="submit"
                            id="paymentSubmit">Submit</button>

                        <div class="payment-submit" id="paymentProcess" style="display: none;">
                            <div class="loader">
                                <div class="text-load">Please wait while you are redirected to the payment...</div>
                                <div class="circle-loader">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-lg-4 colsm-12 col-md-5 order-md-2 order-1 ml-auto mb-3 mb-md-0">
                <div class="package-info shadow">
                    @isset($package->image)
                        <div class="">
                            <img data-src="{{ asset($package->image) }}" alt="{{ $package->name }}"
                                src="{{ asset($package->image) }}" data-loaded="true">
                        </div>
                    @endisset
                    <div class="p-3">
                        <h4>{{ $package->name }}</h4>
                        <table class="package-info">
                            <tbody class="p-0 m-0">
                                <tr>
                                    <td>Trip Duration</td>
                                    <td>:</td>
                                    <td>{{ $package->duration }} Days</td>
                                </tr>
                                <tr>
                                    <td>Start Date</td>
                                    <td> : </td>
                                    <td id="show_start_date">2025-01-06</td>
                                </tr>
                                <tr>
                                    <td>Total Person</td>
                                    <td>:</td>
                                    <td id="show_total_person">{{ $guest }} Person(s)</td>
                                </tr>
                                <tr>
                                    <td>Destination</td>
                                    <td>:</td>
                                    <td>{{ $package->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="">
                            <h5 class=""> Total Price: <span id="total_price"
                                    class="text-dark font-weight-bold"></span></h5>
                            {{-- <p> Deposit Payable Now: <span id="total_payable" class="text-secondary">US$280</span></p>
                            <p class="">The balance of US$1119 is payable upon arrival.</p> --}}
                        </div>
                    </div>
                    <div class="card-info text-center p-3 "><span class="square-shape"></span>

                            <p class="m-0" style="font-weight: 600; text-transform: uppercase;">We Accept</p>
                            <img src="{{ asset('images/payment/american-express.avif') }}" alt="Payment Method"
                                style="height: 32px; object-fit: contain;" />
                            <img src="{{ asset('images/payment/master-card.avif') }}" alt="Payment Method"
                                style="height: 32px; object-fit: contain;" />
                            <img src="{{ asset('images/payment/union-pay-logo.avif') }}" alt="Payment Method"
                                style="height: 32px; object-fit: contain;" />
                            <img src="{{ asset('images/payment/visa.avif') }}" alt="Payment Method"
                                style="height: 32px; object-fit: contain;" />
                            <img src="{{ asset('images/payment/UPI.png') }}" alt="Payment Method"
                                style="height: 32px; object-fit: contain;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('css')
        <style>
            .package-info ul li {
                list-style: none;
                padding: 5px 0;
            }

            .package-info {
                background-color: #e0efff8d;
            }

            .text-danger {
                color: red;
                font-size: 12px;
                margin-top: 5px;
            }
        </style>
    @endsection


    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                calculateTotal()
            })

            const packageCosts = @json($package->extra['package_costs']);

            function calculateTotal() {
                const persons = document.getElementById('peoples');
                const totalElement = document.getElementById('total_price');
                const no = parseInt(persons.value) || 1;
                document.getElementById('show_total_person').innerHTML = no + ' Person(s)'

                let pricePerPerson = 0;
                for (let i = 0; i < packageCosts.length; i++) {
                    if (no <= packageCosts[i].person_range) {
                        pricePerPerson = packageCosts[i].usd_amount;
                        break;
                    }
                }

                const total = pricePerPerson * no;
                if (total == 0) {
                    totalElement.innerHTML = 'Person out of range! Contact us for inquiry!';
                } else
                    totalElement.textContent = 'US $' + total.toFixed(2);
            }
        </script>
    @endsection
