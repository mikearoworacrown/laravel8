@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4>Contact Page</h4>
                <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add Contact</button></a>
                <br><br>
                <div class="col-md-12">

                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            </div>
                        @endif

                        <div class="card-header">All Contact Data</div>
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col" width="5%">S/N</th>
                                    <th scope="col" width="35%">Contact Address</th>
                                    <th scope="col" width="20%">Contact Email</th>
                                    <th scope="col" width="15%">Cotact phone</th>
                                    <th scope="col" width="25%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php($i = 1)
                                        @foreach($contacts as $contact)
                                            <tr>
                                            <th scope="row"> {{ $i++ }} </th>
                                            <td> {{ $contact->address }}  </td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>
                                                <a href="{{ url('contact/edit/'.$contact->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ url('contact/delete/'.$contact->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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