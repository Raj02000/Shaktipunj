@extends('layouts.main')
@section('content')
    <div class="container my-5">
        <div class="row mb-5 mx-5">
            <p class="mb-0 section-title position-relative">
                Customized Trip
                <span
                    style="position: absolute; bottom: -5px;left: 0; width: 50%; height: 3px; background-color: #CB9331;"></span>
            </p>
        </div>
        <div class="row mx-5 bg-white shadow">

            <div class="col-lg-12 p-5">
                <div class="standard-form common-module  ">
                    <form action="{{ route('custom.book.submit') }}" method="POST" accept-charset="utf-8">
                        @csrf

                        <h3>Trip Details</h3>
                        <div class="inner-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Package</label>
                                        <select class="form-control " name="package_id" id=""
                                            placeholder="Select Package">
                                            <option value="" selected>Select Package</option>
                                            @forelse ($package as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty
                                                <option value="">No packages found!</option>
                                            @endforelse
                                        </select>
                                        @error('package_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Number of Travellers<span>*</span></label>
                                        <input type="number" class="form-control " min="1" name="people"
                                            id="people" required value="1">
                                        @error('people')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Approx. Date of
                                            Travel<span>*</span></label>
                                        <input type="date" class="form-control " id="start_date" name="start_date"
                                            required autocomplete="off" value="">
                                        @error('start_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                 
                        <h3>Personal Information</h3>
                        <div class="inner-box">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group"><label>First
                                            Name<span>*</span></label>
                                        <input type="text" class="form-control " name="f_name" id="f_name"
                                            required="" value="">
                                        @error('f_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><label>Last
                                            Name<span>*</span></label><input type="text" class="form-control "
                                            name="l_name" id="l_name" required="" value="">
                                        @error('l_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><label>Phone</label><input type="number" class="form-control "
                                            name="phone" required id="phone" value="">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label>Email
                                            Address<span>*</span></label><input type="email" name="email" id="email"
                                            class="form-control " required="" value="">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

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
                            <div class="form-group"><label>More Information<span>*</span></label>
                                <textarea class="form-control " name="comments" id="comments" required="" rows="8"></textarea>
                                @error('comments')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" required="" checked=""
                                        id="terms" name="terms" value="1">
                                    <label class="custom-control-label" for="terms">I
                                        accept terms and conditions
                                        <a href="javascript:void(0);" id="termsandcondition">
                                            <i class="fa fa-question-circle"></i>
                                        </a>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" name="submit" value="submit"
                                class="btn btn-primary btn-md">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
