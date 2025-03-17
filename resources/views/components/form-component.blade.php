@props(['training'])

<style>
    .enquiry-form-heading {
        font-size: 24px;
        font-weight: 600;
    }

    .form-container {
        background: rgba(244, 246, 252, 1);
    }

    .form-label {
        font-size: 18px;
        font-weight: 600;
        margin-top: 0.75rem;
    }

    .px-2 {
        height: 45px;
        border-radius: 5px;
        margin-bottom: 0.75rem;
        border: 0.5px solid rgba(135, 7, 7, 0.55);
    }

    .form-text-area {
        border-radius: 5px;
        margin-bottom: 0.75rem;
        border: 0.5px solid rgba(135, 7, 7, 0.55);
    }

    .yes-no-radio {
        border-color: rgba(215, 24, 24, 1);
    }
</style>

<div class="my-5 py-5 container form-container d-flex justify-content-center">
    <div class="col-sm-10 col-11">
        <form action="{{ route('enquiry.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="enquiry-form-heading">Make your dream to Study Abroad....</div>
                <p class="form-label">Your Basic Info</p>

                <div>
                    <input class="w-100 px-2" type="text" name="name" id="" placeholder="Name"
                        value="{{ old('name') }}">
                    @error('name')
                        <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-sm-5">
                    <label for="dob" class="form-label">Date Of Birth</label>
                    <input class="w-100 px-2 " type="date" id="dob" name="date_of_birth"
                        value="{{ old('date_of_birth') }}">
                    @error('date_of_birth')
                        <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <p class="form-label">Academic Qualification</p>
                <select name="qualification" class="px-2 col-sm-3" aria-label="Default select example">
                    <option selected>Last Qualification</option>
                    <option value="+2">+2</option>
                    <option value="Bachelors">Bachelors</option>
                    <option value="Masters">Masters</option>
                    <option value="SEE">SEE</option>
                </select>
                @error('qualification')
                    <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                @enderror

                <p class="form-label">Additional Info</p>
                <div class="row m-0 p-0 d-flex justify-content-between">

                    <select name="marital_status" class="px-2 col-sm-3" aria-label="Default select example">
                        <option selected>Marital Status</option>
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                    </select>
                    @error('marital_status')
                        <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="col-sm-4 p-0">
                        <input class="w-100 px-2 " type="text" name="address" id="" placeholder="Address"
                            value="{{ old('address') }}">
                        @error('address')
                            <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-sm-4 p-0">
                        <input class="w-100 px-2 " type="number" name="number" id="" placeholder="Mobile No."
                            value="{{ old('number') }}">
                        @error('contact')
                            <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-7 p-0">
                    <input class="w-100 px-2 " type="text" name="email" id="" placeholder="Email"
                        value="{{ old('email') }}">
                    @error('email')
                        <span style="font-size: 10px;" class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="form-label">What training do you want to apply for?</p>
                        {{-- {{ dd($training->services) }} --}}
                        <select name="training" class="px-2 col-sm-8 " aria-label="Default select example">
                            <option selected value="none">Training</option>
                            @foreach ($training->services as $service)
                                <option value="{{ $service->title }}">{{ $service->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <p class="form-label">Which month would you like to join?</p>
                        <select name="training_month" class="px-2 w-50" aria-label="Default select example">
                            <option selected value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="button-gradient px-4 mt-4 py-2 rounded-pill">Send</button>
        </form>
    </div>
</div>
