@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        @endif

                        <div class="card-header">All Brand</div>
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <!-- @php($i = 1) -->
                                        @foreach($brands as $brand)
                                            <tr>
                                            <th scope="row"> {{ $brands->firstItem()+$loop->index }} </th>
                                            <td> {{ $brand->brand_name }}  </td>
                                            <td> <img src="{{ asset($brand->brand_image) }}" style="height:40px; width:60px;"> </td>
                                            <td>@if($brand->created_at == NULL)
                                                <span class="text-danger">No date set</span>
                                                @else
                                                {{ $brand->created_at->diffForHumans() }} 
                                                @endif
                                            </td>
                                            <td> 
                                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                                            </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div style="padding-left: 5px; padding-right:5px;">{{ $brands->links() }}</div>
                    </div> 
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" aria-describedby="emailHelp">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image" aria-describedby="emailHelp">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                
                    </div> 
                </div>

            </div>
        </div>
    </div>

@endsection