<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public const SERVICES = ['comedor', 'coffee-break', 'catering', 'otro'];

    public const KITCHEN_OPTIONS = ['si', 'no', 'no-se'];

    public const EVENT_SERVICES = ['coffee-break', 'catering'];

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'service' => ['required', Rule::in(self::SERVICES)],
            'people' => 'required|integer|min:1|max:100000',
            'shifts' => 'required_if:service,comedor|nullable|string|max:500',
            'location' => 'required|string|max:255',
            'kitchen' => ['nullable', Rule::in(self::KITCHEN_OPTIONS)],
            'event_date' => ['nullable', 'date', 'after_or_equal:today', Rule::requiredIf(fn () => in_array($this->input('service'), self::EVENT_SERVICES, true))],
            'message' => 'nullable|string|max:2000',
            'source_page' => ['nullable', Rule::in(array_keys(config('seo.pages')))],
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages(): array
    {
        return [
            'shifts.required_if' => __('website.quote.required_if'),
            'event_date.required' => __('website.quote.required_if'),
            'g-recaptcha-response.required' => __('website.quote.captcha'),
            'g-recaptcha-response.captcha' => __('website.quote.captcha'),
        ];
    }

    public function attributes(): array
    {
        return collect(__('website.quote.fields'))
            ->mapWithKeys(fn ($label, $field) => [$field => mb_strtolower($label)])
            ->all();
    }

    protected function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#contact';
    }
}
