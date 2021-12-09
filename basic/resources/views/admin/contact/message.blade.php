@extends('admin.admin_master')

@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4>Admin Message Page</h4>
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">All Messages</div>
                        
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col" width="5%">S/N</th>
                                    <th scope="col" width="15%">Name</th>
                                    <th scope="col" width="15%">Email</th>
                                    <th scope="col" width="15%">Subject</th>
                                    <th scope="col" width="35%">Message</th>
                                    <th scope="col" width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php($i = 1)
                                        @foreach($messages as $message)
                                            <tr>
                                            <th scope="row"> {{ $i++ }} </th>
                                            <td> {{ $message->name }}  </td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->message }}</td>
                                            <td>
                                                <a href="{{ url('message/delete/'.$message->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
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