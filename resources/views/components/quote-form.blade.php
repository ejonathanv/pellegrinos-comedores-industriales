@props(['service' => null, 'image' => 'img/portadas/contacto.webp'])
@php
    $services = \App\Http\Requests\ContactRequest::SERVICES;
    $eventServices = \App\Http\Requests\ContactRequest::EVENT_SERVICES;
    $requested = request()->query('servicio');
    $selected = old('service', in_array($requested, $services, true) ? $requested : $service);
    $showDining = $selected === 'comedor';
    $showEvent = in_array($selected, $eventServices, true);
@endphp
<section id="contact" class="cs s-py-90 s-py-xl-90">
    <div class="contactForm">
        <div class="coverPicture" style="background-image: url('{{ asset($image) }}')">
        </div>
        <div class="form">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('contact-to-pellegrinos') }}"
                class="quote-form"
                data-captcha-message="{{ __('website.quote.captcha') }}"
                method="POST">
                @csrf
                <input type="hidden" name="locale" value="{{ app()->getLocale() }}">
                <input type="hidden" name="source_page" value="{{ \App\Support\Seo::currentPage() }}">
                <h2 class="mt-0 mb-4 special-heading color-darkgrey quote-form-title">
                    <span>{{ __('website.quote.title') }}</span>
                </h2>
                <p class="color-darkgrey fs-20 fw-500">
                    {{ __('website.quote.description') }}
                </p>
                <div class="divider-20"></div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="quote-company">{{ __('website.quote.fields.company') }} *</label>
                        <input type="text" id="quote-company" name="company" value="{{ old('company') }}" @class(['form-control', 'is-invalid' => $errors->has('company')]) autocomplete="organization" required>
                        @error('company')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="quote-name">{{ __('website.quote.fields.name') }} *</label>
                        <input type="text" id="quote-name" name="name" value="{{ old('name') }}" @class(['form-control', 'is-invalid' => $errors->has('name')]) autocomplete="name" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="quote-phone">{{ __('website.quote.fields.phone') }} *</label>
                        <input type="tel" id="quote-phone" name="phone" value="{{ old('phone') }}" @class(['form-control', 'is-invalid' => $errors->has('phone')]) autocomplete="tel" required>
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="quote-email">{{ __('website.quote.fields.email') }} *</label>
                        <input type="email" id="quote-email" name="email" value="{{ old('email') }}" @class(['form-control', 'is-invalid' => $errors->has('email')]) autocomplete="email" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="quote-service">{{ __('website.quote.fields.service') }} *</label>
                        <select id="quote-service" name="service" @class(['form-control', 'is-invalid' => $errors->has('service')]) data-quote-service required>
                            <option value="" @selected(! $selected) disabled>{{ __('website.quote.placeholders.service') }}</option>
                            @foreach ($services as $key)
                                <option value="{{ $key }}" @selected($selected === $key)>{{ __("website.quote.services.{$key}") }}</option>
                            @endforeach
                        </select>
                        @error('service')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="quote-people">{{ __('website.quote.fields.people') }} *</label>
                        <input type="number" id="quote-people" name="people" value="{{ old('people') }}" min="1" step="1" inputmode="numeric" @class(['form-control', 'is-invalid' => $errors->has('people')]) required>
                        @error('people')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="quote-location">{{ __('website.quote.fields.location') }} *</label>
                        <input type="text" id="quote-location" name="location" value="{{ old('location') }}" placeholder="{{ __('website.quote.placeholders.location') }}" @class(['form-control', 'is-invalid' => $errors->has('location')]) required>
                        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row" data-show-for="comedor" @if (! $showDining) hidden @endif>
                    <div class="col-md-6">
                        <label for="quote-shifts">{{ __('website.quote.fields.shifts') }} *</label>
                        <input type="text" id="quote-shifts" name="shifts" value="{{ old('shifts') }}" placeholder="{{ __('website.quote.placeholders.shifts') }}" @class(['form-control', 'is-invalid' => $errors->has('shifts')]) data-required>
                        @error('shifts')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="quote-kitchen">{{ __('website.quote.fields.kitchen') }} <small>({{ __('website.quote.optional') }})</small></label>
                        <select id="quote-kitchen" name="kitchen" @class(['form-control', 'is-invalid' => $errors->has('kitchen')])>
                            <option value="">{{ __('website.quote.placeholders.kitchen') }}</option>
                            @foreach (__('website.quote.kitchen_options') as $key => $label)
                                <option value="{{ $key }}" @selected(old('kitchen') === $key)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('kitchen')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row" data-show-for="{{ implode(' ', $eventServices) }}" @if (! $showEvent) hidden @endif>
                    <div class="col-md-6">
                        <label for="quote-event-date">{{ __('website.quote.fields.event_date') }} *</label>
                        <input type="date" id="quote-event-date" name="event_date" value="{{ old('event_date') }}" min="{{ now()->toDateString() }}" @class(['form-control', 'is-invalid' => $errors->has('event_date')]) data-required>
                        @error('event_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="quote-message">{{ __('website.quote.fields.message') }} <small>({{ __('website.quote.optional') }})</small></label>
                        <textarea id="quote-message" name="message" rows="3" placeholder="{{ __('website.quote.placeholders.message') }}" @class(['form-control', 'is-invalid' => $errors->has('message')])>{{ old('message') }}</textarea>
                        @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-maincolor" data-quote-submit>
                            {{ __('website.quote.submit') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
