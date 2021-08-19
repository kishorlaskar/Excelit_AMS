@extends('Admin.app')
@section('title','Edit  Employee')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    {{--                    <div class="card-title">@yield('title')</div>--}}
                    <hr>

                    <form action="{{ route('update-employee',$edit_employee->id) }}"method="post" id="myform">
                        @csrf
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control"name="first_name" id="first_name"value="{{$edit_employee->first_name}}" placeholder="Enter Your First Name">
                        </div>


                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control"name="last_name" id="last_name"value="{{$edit_employee->last_name}}" placeholder="Enter Your Last Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control"name="email" id="email"value="{{$edit_employee->email}}" placeholder="Enter Your Email Address">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Date Of Birth</label>
                            <input type="text" class="form-control" name="dob"value="{{$edit_employee->dob}}" id="dob" placeholder="Enter Your Date Of Birth">
                        </div>
                        <div class="form-group">
                            <label for="pr_address">Permanent Address </label>

                            <textarea id="parmanent_address" name="parmanent_address" rows="4" cols="85">

                               {{ $edit_employee->parmanent_address }}
                             </textarea>
                        </div>

                        <div class="form-group">
                            <label for="pr_address">Present Address </label>

                            <textarea id="present_address" name="present_address" rows="4"  cols="85">
                                {{ $edit_employee->present_address }}
                            </textarea>
                        </div>


                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{$edit_employee->password}}" placeholder="Enter Password">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="confirm_password">Confirm Password</label>--}}
{{--                            <input type="password" class="form-control"name="password_confirmation" id="confirm_password" placeholder="Confirm Password">--}}
{{--                        </div>--}}
                        <div class="form-group text-right mb-0">
                            <button type="submit" class="btn btn-primary px-5"><i class="icon-check"></i> Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
