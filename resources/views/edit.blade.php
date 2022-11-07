


  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </x-slot>
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div style="color: red">{{$error}}</div>
     @endforeach
 @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('update',$data->id)}}"method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$data->name}}"> <br>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" placeholder="surname" name="surname" value="{{$data->surname}}"> <br>
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{$data->email}}"> <br>
                          </div>
                          <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" placeholder="phone_number" name="phone_number" value="{{$data->phone_number}}"> <br>
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="address" name="address" value="{{$data->address}}"> <br>
                          </div>
                          <div class="form-group">
                            <label for="pin_code">Pincode</label>
                            <input type="text" class="form-control" id="pin_code" placeholder="pin_code" name="pin_code" value="{{$data->pin_code}}"> <br>
                          </div>
                          <div class="mt-4">
                            <select name="country_id" id="country-dd" class="block mt-1 w-full">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)

                                <option value="{{ $country->id }}" @if($country->id == $data->country_id) selected @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <select id="state-dd" name="state_id" class="block mt-1 w-full">
                            </select>
                        </div>
                        <div class="mt-4">
                            <select id="city-dd" name="city_id" class="block mt-1 w-full">
                            </select>
                        </div>

                          <div class="form-group">
                          <label for="image">image:</label>
                          <input type="file" class="form-control" id="image" placeholder="image" name="image" value="{{$data->image}}"> <br>
                          </div>

                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="password" name="password" disabled > <br>
                          </div>



                    <button type="Update" class="btn btn-success">Update</button>
                        </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>

