@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Role </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mt-2 mb-2">
                        <h1 class="card-title">Add New Role</h1>
                        <a href="{{route('admin.userManagement.role.index')}}" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-list-check"></i> Role List
                        </a>
                    </div>
                    <form class="" action="{{route('admin.userManagement.role.store')}}" method="post">
                        @csrf
                        <fieldset class="form-group border p-3">
                            <div class="form-group">
                                <label for="title" class="form-label">Title <sup class="text-danger">*</sup></label>
                                <input type="text"
                                       name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       id="title"
                                       value="{{old('title')}}"
                                       placeholder="Title"
                                >
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type" class="form-label">Type</label>
                                <input type="text"
                                       name="type"
                                       class="form-control @error('type') is-invalid @enderror"
                                       id="type"
                                       value="{{old('type')}}"
                                       placeholder="Type"
                                >
                                @error('type')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="permissions" class="form-label">Permissions <sup
                                    class="text-danger">*</sup></label>
                            <fieldset class="border p-2">
                                <div class="row">
                                    @foreach($permissions as $permission)
                                        <div class="col-sm-3">
                                            <div class="form-check form-check-flat form-check-primary">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="permissions[]"
                                                           value="{{$permission->id}}"
                                                           class="form-check-input">
                                                    {{$permission->title}}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                            @error('permissions')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('permissions.*')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
