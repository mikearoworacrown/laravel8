@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4>Home Slider</h4>
                <a href="{{ route('add.slider') }}"><button class="btn btn-info">Add Slider</button></a>
                <br><br>
                <div class="col-md-12">

                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        @endif

                        <div class="card-header">All Slider</div>
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col" width="5%">S/N</th>
                                    <th scope="col" width="15%">Slider Title</th>
                                    <th scope="col" width="45%">Description</th>
                                    <th scope="col" width="10%">Image</th>
                                    <th scope="col" width="25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php($i = 1)
                                        @foreach($sliders as $slider)
                                            <tr>
                                            <th scope="row"> {{ $i++ }} </th>
                                            <td> {{ $slider->title }}  </td>
                                            <td>{{ $slider->description }}</td>
                                            <td> <img src="{{ asset($slider->image) }}" style="height:40px; width:60px;"> </td>
                                            <td> 
                                                <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                                            </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            
                    </div> 
                </div>
                
                

            </div>
        </div>
    </div>

@endsection