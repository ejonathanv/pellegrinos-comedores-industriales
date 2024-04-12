<section id="contact" class="cs s-py-90 s-py-xl-90">
    <div class="contactForm">
        <div class="coverPicture" style="background-image: url('img/portadas/contacto.jpg')">
        </div>
        <div class="form">

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact-to-pellegrinos') }}" 
                onsubmit="document.getElementById('contactForm_submit').disabled = true; return true;"
                method="POST">
                @csrf
                <h4 class="mt-0 mb-2 special-heading color-darkgrey">
                    <span>
                        {{ __('website.contact.title') }}
                    </span>
                </h4>
                <p class="color-darkgrey fs-20 fw-500">
                    <span>
                        {{ __('website.contact.description') }}
                    </span>
                </p>
                <div class="divider-40 divider-xl-20"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="text" 
                            class="form-control" 
                            name="firstName"
                            placeholder="{{ __('website.contact.form.firstName') }}"
                            required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" 
                            class="form-control" 
                            name="lastName"
                            placeholder="{{ __('website.contact.form.lastName') }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="email" 
                            class="form-control" 
                            name="email"
                            placeholder="{{ __('website.contact.form.email') }}"
                            required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" 
                            class="form-control" 
                            name="phone"
                            placeholder="{{ __('website.contact.form.phone') }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="text" 
                            class="form-control" 
                            name="subject"
                            placeholder="{{ __('website.contact.form.subject') }}"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea class="form-control" 
                            name="message"
                            placeholder="{{ __('website.contact.form.message') }}" rows="3" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-maincolor" id="contactForm_submit">
                            {{ __('website.contact.form.submit') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>