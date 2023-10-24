@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Account Settings</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>Setting</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-lg-6">
                                        <p class="m-0"><strong>Profile Information</strong></p>
                                        <small>Update your accounts profile information and email address.</small><br>
                                        <label class="mt-4 mb-0 form-label col-form-label-sm" for="name">Name</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                aria-describedby="name" value="{{ Auth::user()->name }}">
                                        </div>
                                        <label class="mb-0 form-label col-form-label-sm" for="email">Email</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                aria-describedby="email" value=" {{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-lg-6">
                                        <p class="m-0"><strong>Update Password</strong></p>
                                        <small>Ensure your account is using a long, random password to stay
                                            secure.</small><br>
                                        <label class="mt-4 mb-0 form-label col-form-label-sm" for="current_password">Current
                                            Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="current_password"
                                                name="current_password" aria-describedby="current_password">
                                        </div>
                                        <label class="mb-0 form-label col-form-label-sm" for="new_password">New
                                            Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="new_password"
                                                name="new_password" aria-describedby="new_password">
                                        </div>
                                        <label class="mb-0 form-label col-form-label-sm" for="confirm_password">Confirm
                                            Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="confirm_password"
                                                name="confirm_password" aria-describedby="confirm_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-lg-6">
                                        <p class="m-0"><strong>Delete Account</strong></p>
                                        <small>Once your account is deleted, all of its resources and data will be
                                            permanently deleted.</small><br>
                                        <small>Before deleting your account, please download any data or information that
                                            you wish to retain.</small><br>
                                        <a href="#" class="btn btn-sm btn-danger mt-4">DELETE ACCOUNT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
