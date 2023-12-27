@extends('admin.layouts.master')

@push('styles')
    <style>

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: #0c4128;
            cursor: inherit;
        }

        #img-upload {
            width: 150px;
            height: 150px;
        }

    </style>
@endpush

@section('content')
    <div class="page-header">
        <h3 class="page-title"> User </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mt-2 mb-2">
                        <h1 class="card-title">Edit User</h1>
                        <a href="{{route('admin.userManagement.user.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa-solid fa-list-check"></i> User List
                        </a>
                    </div>
                    <form class="" action="{{route('admin.userManagement.user.update', $user)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset class="form-group border p-3">
                            <div class="row">
                                <div class="col-md-6 form-group mt-2">
                                    <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                                    <input type="text"
                                           name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           value="{{old('name', $user->name)}}"
                                           placeholder="name"
                                    >
                                    @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mt-2">
                                    <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>
                                    <input type="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           value="{{old('email',$user->email)}}"
                                           placeholder="email"
                                    >
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mt-2">
                                    <label for="phone" class="form-label">phone <sup class="text-danger">*</sup></label>
                                    <input type="text"
                                           name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           id="phone"
                                           value="{{old('phone', $user->phone)}}"
                                           placeholder="phone"
                                    >
                                    @error('phone')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mt-2">
                                    <label for="role_id" class="form-label">Role<sup
                                            class="text-danger">*</sup></label>
                                    <select name="role_id"
                                            id="role_id"
                                            class="form-select @error('role_id') is-invalid @enderror"
                                    >
                                        <option value="#">--Choose a Role --</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}"
                                                {{$role->id==old('role_id',$user->role_id)?'selected':''}}
                                            >{{$role->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mt-2">
                                    <label for="password" class="form-label">Password <sup class="text-danger">*</sup></label>
                                    <input type="password"
                                           name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="password"
                                           value="{{old('password')}}"
                                           placeholder="password"
                                    >
                                    @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group mt-2">
                                    <label for="password_confirmation" class="form-label">Confirm Password <sup class="text-danger">*</sup></label>
                                    <input type="password"
                                           name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="password_confirmation"
                                           value="{{old('password_confirmation')}}"
                                           placeholder="password_confirmation"
                                    >
                                    @error('password_confirmation')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label for="profile_photo_path">Upload Image <sup class="text-danger">*</sup></label>
                                        <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file"><i class="fa fa-cloud-upload"></i>Browse… <input type="file"
                                                                                                                                            name="profile_photo_path" id="imgInp"></span></span>
                                            <input type="text" name="profile_photo_path" class="form-control" readonly>
                                        </div>
                                        <img id='img-upload' src="{{$user->photo_url}}" class="mt-2"/>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-2 me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <script>
        $(document).ready(function () {
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function () {
                readURL(this);
            });
        });
    </script>
@endpush
