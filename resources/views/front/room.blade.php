@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->room_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="home-rooms">
    <div class="container">
        <div class="row">
            @foreach($room_all as $item)
            <div class="col-md-3">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="{{ route('room_detail',$item->id) }}">{{ $item->name }}</a></h2>
                        <div class="price">
                            ${{ $item->price }}/night
                        </div>
                        @php
    $avgRating = round($item->averageRating(), 1);
    $ratingCount = $item->ratingCount();
@endphp

<!-- @if($ratingCount > 0)
@php
    dump($item->reviews); // TEMPORARY
@endphp -->

    <div class="rating text-warning mb-2">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= floor($avgRating))
                ★
            @elseif ($i - $avgRating < 1)
                ☆
            @else
                ☆
            @endif
        @endfor
        <span class="text-dark">{{ $avgRating }} / 5</span>
        <small>({{ $ratingCount }} {{ Str::plural('rating', $ratingCount) }})</small>
    </div>
@endif

                        <div class="button">
                            <a href="{{ route('room_detail',$item->id) }}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-12">
                {{ $room_all->links() }}
            </div>
        </div>
    </div>
</div>
@endsection