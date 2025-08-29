@extends('front.layout.app')

@section('main_content')

<!-- About Section Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      
      {{-- Left Column: Text + Counters --}}
      <div class="col-lg-6">
        <h6 class="section-title text-start text-primary text-uppercase">
          {{ $about->title ?? 'About Us' }}
        </h6>
        <h1 class="mb-4">
          {{ $about->subtitle ?? '' }}
        </h1>
        <p class="mb-4">
          {!! $about->description ?? '' !!}
        </p>

        {{-- Counters --}}
        @if(!empty($about->counters))
        <div class="row g-3 pb-4">
          @foreach($about->counters as $counter)
            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
              <div class="border rounded p-1">
                <div class="border rounded text-center p-4">
                  <i class="{{ $counter['icon'] ?? 'fa fa-star' }} fa-2x text-primary mb-2"></i>
                  <h2 class="mb-1" data-toggle="counter-up">{{ $counter['number'] ?? 0 }}</h2>
                  <p class="mb-0">{{ $counter['label'] ?? '' }}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        @endif

        {{-- Button --}}
        @if(!empty($about->button_text))
        <a class="btn btn-primary py-3 px-5 mt-2" href="{{ $about->button_link ?? '#' }}">
          {{ $about->button_text }}
        </a>
        @endif
      </div>

      {{-- Right Column: Images --}}
      <div class="col-lg-6">
        <div class="row g-3">
          @if(!empty($about->images))
            @foreach($about->images as $img)
              <div class="col-6 text-center">
                <img class="img-fluid rounded w-75 wow zoomIn"
                     data-wow-delay="0.1s"
                     src="{{ asset('storage/' . $img['path']) }}"
                     alt="{{ $img['alt'] ?? 'About image' }}" />
              </div>
            @endforeach
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
<!-- About Section End -->

@endsection
