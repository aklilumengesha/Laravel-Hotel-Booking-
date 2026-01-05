@extends('admin.layout.app')

@section('heading', 'Edit Room')

@section('right_top_button')
<a href="{{ route('admin.room.index') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
<!-- this admin_room_view changed to admin.room.index -->
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- <form action="{{ route('admin.room.update',$room_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                         <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Featured Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$room_data->featured_photo) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Featured Photo</label>
                                    <div>
                                        <input type="file" name="featured_photo">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ $room_data->name }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" class="form-control snote" cols="30" rows="10">{{ $room_data->description }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Price *</label>
                                    <input type="text" class="form-control" name="price" value="{{ $room_data->price }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Total Rooms *</label>
                                    <input type="text" class="form-control" name="total_rooms" value="{{ $room_data->total_rooms }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Amenities</label>
                                    @php $i=0; @endphp
                                    @foreach($all_amenities as $item)

                                    @if(in_array($item->id,$existing_amenities))
                                    @php $checked_type = 'checked'; @endphp
                                    @else
                                    @php $checked_type = ''; @endphp
                                    @endif

                                    @php $i++; @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_amenities[]" {{ $checked_type }}>
                                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                                            {{ $item->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Room Size</label>
                                    <input type="text" class="form-control" name="size" value="{{ $room_data->size }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Beds</label>
                                    <input type="text" class="form-control" name="total_beds" value="{{ $room_data->total_beds }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Bathrooms</label>
                                    <input type="text" class="form-control" name="total_bathrooms" value="{{ $room_data->total_bathrooms }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Balconies</label>
                                    <input type="text" class="form-control" name="total_balconies" value="{{ $room_data->total_balconies }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Guests</label>
                                    <input type="text" class="form-control" name="total_guests" value="{{ $room_data->total_guests }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video Preview</label>
                                    <div class="iframe-container1">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $room_data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Video Id</label>
                                    <input type="text" class="form-control" name="video_id" value="{{ $room_data->video_id }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form> -->
                    <form action="{{ route('admin.room.update',$room_data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-md-12">
            <div class="mb-4">
                <label class="form-label">Existing Featured Photo</label>
                <div>
                    <img src="{{ asset('uploads/'.$room_data->featured_photo) }}" alt="" class="w_200">
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Change Featured Photo</label>
                <div>
                    <input type="file" name="featured_photo">
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Name *</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $room_data->name) }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Description *</label>
                <textarea name="description" class="form-control snote" cols="30" rows="10">{{ old('description', $room_data->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="form-label">Price *</label>
                <input type="text" class="form-control" name="price" value="{{ old('price', $room_data->price) }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Total Rooms *</label>
                <input type="text" class="form-control" name="total_rooms" value="{{ old('total_rooms', $room_data->total_rooms) }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Amenities</label>
                @php $i=0; @endphp
                @foreach($all_amenities as $item)
                    @php
                        if( old('arr_amenities') ) {
                            $checked_type = in_array($item->id, old('arr_amenities')) ? 'checked' : '';
                        } else {
                            $checked_type = in_array($item->id, $existing_amenities) ? 'checked' : '';
                        }
                    @endphp
                    @php $i++; @endphp
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" id="defaultCheck{{ $i }}" name="arr_amenities[]" {{ $checked_type }}>
                        <label class="form-check-label" for="defaultCheck{{ $i }}">
                            {{ $item->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="mb-4">
                <label class="form-label">Room Size</label>
                <input type="text" class="form-control" name="size" value="{{ old('size', $room_data->size) }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Beds</label>
                <input type="text" class="form-control" name="total_beds" value="{{ old('total_beds', $room_data->total_beds) }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Bathrooms</label>
                <input type="text" class="form-control" name="total_bathrooms" value="{{ old('total_bathrooms', $room_data->total_bathrooms) }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Balconies</label>
                <input type="text" class="form-control" name="total_balconies" value="{{ old('total_balconies', $room_data->total_balconies) }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Guests</label>
                <input type="text" class="form-control" name="total_guests" value="{{ old('total_guests', $room_data->total_guests) }}">
            </div>
            <div class="mb-4">
                <label class="form-label">Video Preview</label>
                <div class="iframe-container1">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $room_data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Video Id</label>
                <input type="text" class="form-control" name="video_id" value="{{ old('video_id', $room_data->video_id) }}">
            </div>
            <div class="mb-4">
                <label class="form-label"></label>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection