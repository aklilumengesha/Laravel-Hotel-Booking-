@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $single_room_data->name }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content room-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left">
                @if(Auth::guard('customer')->check())
    @php
        $customer_id = Auth::guard('customer')->id();
        $hasBooked = \App\Models\OrderDetail::where('room_id', $single_room_data->id)
                        ->whereHas('order', function($q) use ($customer_id) {
                            $q->where('customer_id', $customer_id);
                        })->exists();

        $alreadyReviewed = \App\Models\Review::where('room_id', $single_room_data->id)
                        ->where('customer_id', $customer_id)
                        ->exists();
    @endphp

    @if($hasBooked && !$alreadyReviewed)
        <div class="review-form mt-5">
            <h3>Leave a Review</h3>
            <form action="{{ route('room_review_store') }}" method="POST">
                @csrf
                <input type="hidden" name="room_id" value="{{ $single_room_data->id }}">
                <div class="form-group">
                    <label for="rating">Rating (1 to 5)</label>
                    <input type="number" name="rating" min="1" max="5" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit Review</button>
            </form>
        </div>
    @elseif($alreadyReviewed)
        <p class="text-info">You already reviewed this room.</p>
    @endif
@else
    <p class="text-warning">Login to leave a review.</p>
@endif
      <div class="reviews mt-5">
    <h3>Customer Reviews</h3>
    @forelse($single_room_data->reviews as $review)
        <div class="border p-3 mb-2">
            <strong>{{ $review->customer->name ?? 'Customer' }}</strong>
            <div>Rating: {{ $review->rating }} ⭐</div>
            <p>{{ $review->comment }}</p>
        </div>
    @empty
        <p>No reviews yet.</p>
    @endforelse
</div>

                <div class="room-detail-carousel owl-carousel">
                    <div class="item" style="background-image:url({{ asset('uploads/'.$single_room_data->featured_photo) }});">
                        <div class="bg"></div>
                    </div>
                    
                    @foreach($single_room_data->rRoomPhoto as $item)
                    <div class="item" style="background-image:url({{ asset('uploads/'.$item->photo) }});">
                        <div class="bg"></div>
                    </div>
                    @endforeach

                </div>
                
                <div class="description">
                    {!! $single_room_data->description !!}
                </div>

               <div class="amenity">
    <div class="row">
        <div class="col-md-12">
            <h2>Amenities</h2>
        </div>
    </div>
    <div class="row">
        @php
        $arr = explode(',', $single_room_data->amenities);
        for ($j = 0; $j < count($arr); $j++) {
            $temp_row = \App\Models\Amenity::find($arr[$j]); // Cleaner and faster than where()->first()
            if ($temp_row) {
                echo '<div class="col-lg-6 col-md-12">';
                echo '<div class="item"><i class="fa fa-check-circle"></i> ' . $temp_row->name . '</div>';
                echo '</div>';
            }
        }
        @endphp
    </div>
</div>



                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Features</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Size</th>
                                <td>{{ $single_room_data->size }}</td>
                            </tr>
                            <tr>
                                <th>Number of Beds</th>
                                <td>{{ $single_room_data->total_beds }}</td>
                            </tr>
                            <tr>
                                <th>Number of Bathrooms</th>
                                <td>{{ $single_room_data->total_bathrooms }}</td>
                            </tr>
                            <tr>
                                <th>Number of Balconies</th>
                                <td>{{ $single_room_data->total_balconies }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($single_room_data->video_id != '')
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $single_room_data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif


            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 right">

                <div class="sidebar-container" id="sticky_sidebar">

                    <div class="widget">
                        <h2>Room Price per Night</h2>
                        <div class="price">
                            ${{ $single_room_data->price }}
                        </div>
                    </div>
                    <div class="widget">
                        <h2>Reserve This Room</h2>
                        <form action="{{ route('cart_submit') }}" method="post">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $single_room_data->id }}">
                            <div class="form-group mb_20">
                                <label for="">Check in & Check out</label>
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Adult</label>
                                <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Children</label>
                                <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                            </div>
                            <button type="submit" class="book-now">Add to Cart</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@endsection