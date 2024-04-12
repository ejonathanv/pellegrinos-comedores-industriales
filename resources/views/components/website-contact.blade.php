<section id="contact" class="cs s-py-90 s-py-xl-90">
    <div class="contactForm">
        <div class="coverPicture" style="background-image: url('img/portadas/contacto.jpg')">
        </div>
        <div class="form">
            <form action="">
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
                        <input type="text" class="form-control" placeholder="{{ __('website.contact.form.firstName') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="{{ __('website.contact.form.lastName') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="{{ __('website.contact.form.email') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="{{ __('website.contact.form.phone') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="{{ __('website.contact.form.subject') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea class="form-control" placeholder="{{ __('website.contact.form.message') }}" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-maincolor">
                            {{ __('website.contact.form.submit') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>