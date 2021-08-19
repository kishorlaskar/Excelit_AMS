@extends('admin.app')
@section('title','User')

@section('content')
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">@yield('title')</h4>
        </div>
        <div class="col-sm-3 ">
            <div class="btn-group float-sm-right">
                <a href="{{route('addUserForm')}}" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-user-plus mr-1"></i> Add New User</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header border-0">@yield('title')

                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->role==='1'?'Admin':'User'}}</td>
                                                        <td>
                                                        @if($user->status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                        </td>
                                                        <td>
                                                            @if($user->status == 1)
                                                                <a href="{{ route('active',$user->id) }}" class="btn btn-sm btn-info" title="Active" ><i class="fa fa-thumbs-up"></i></a>

                                                            @else
                                                                <a href="{{ route('inactive',$user->id) }}" class="btn btn-sm btn-danger" title="Inactive" ><i class="fa fa-thumbs-down"></i></a>
                                                            @endif
                                                            <a href="{{ route('editUser',$user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('deleteUser',$user->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--End Row-->

@endsection
