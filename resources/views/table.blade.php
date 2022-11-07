

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @if(session()->has('msg'))
        <div class="alert alert-success">
            {{session()->get('msg')}}
        </div>
        @endif
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th>Pin_code</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Image</th>

                           </tr>
                           </thead>
                          <tbody>

                            <tr>
                            <td>{{$d->id}}</td>
                            <td>{{@$d->name}}</td>
                            <td>{{$d->surname}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->phone_number}}</td>
                            <td>{{$d->address}}</td>
                            <td>{{$d->pin_code}}</td>
                            <td>{{@$country->name}}</td>
                            <td>{{@$state->name}}</td>
                            <td>{{@$city->name}}</td>
                            <td><img src="{{asset('uploads/'.@$d->image)}}" width="50px" height="50px" alt=""></td>

                          </tr>

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
