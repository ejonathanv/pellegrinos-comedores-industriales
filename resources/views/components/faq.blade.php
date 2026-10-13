@props(['title', 'items'])
@php
    $schema = [
        '@type' => 'FAQPage',
        'mainEntity' => collect($items)->map(fn ($item) => [
            '@type' => 'Question',
            'name' => $item['question'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['answer']],
        ])->all(),
    ];
@endphp
<section id="faq" class="ls s-py-60 s-py-xl-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="text-center mt-0 mb-5 color-darkgrey">{{ $title }}</h2>
                <div class="faq-list">
                    @foreach ($items as $item)
                        <details class="faq-item" @if ($loop->first) open @endif>
                            <summary>{{ $item['question'] }}</summary>
                            <p>{{ $item['answer'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<x-json-ld :schema="$schema" />
