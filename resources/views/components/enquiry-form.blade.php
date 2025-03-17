@props(['class'])

<form class="{{ $class }}" action="{{ route('page.contact.store') }}" method="POST">
    @csrf

    <!-- Contact Form Input -->
    <div class="form-group col-lg-12">
        <input type="text" name="name" class="form-control name" placeholder="Enter Your Name" required>
    </div>

    <!-- Contact Form Input -->
    <div class="form-group col-lg-12">
        <input type="email" name="email" class="form-control email" placeholder="Enter Your Email" required>
    </div>

    <!-- Contact Form Input -->
    <div class="form-group col-lg-12">
        <input type="text" name="number" class="form-control" placeholder="Phone Number" required>
    </div>

    <!-- Contact Form Input -->
    <div class="form-group col-lg-12">
        <input type="text" name="subject" class="form-control" placeholder="Enquiry Subject">
    </div>

    <!-- Contact Form Mesaage -->
    <div id="input-message" class="form-group col-lg-12 input-message">
        <textarea class="form-control message" name="message" rows="6" placeholder="Your Message ..." required></textarea>
    </div>

    <!-- Contact Form Button -->
    <div class="form-group col-lg-12 mt-15">
        <button type="submit" class="btn btn-primary tra-black-hover submit">Send Your Message</button>
    </div>

    <!-- Contact Form Message -->
    <div class="form-group col-lg-12 contact-form-msg text-center">
        <div class="sending-msg"><span class="loading"></span></div>
    </div>

</form>
