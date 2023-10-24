@extends('layouts.admin')

@section('title')
    Create Project
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card rounded-kraf card-outline card-orange">
            <div class="card-header">
                <h3 class="card-title">Project Create</h3>
            </div>
            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Project name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter project name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="client">Client name</label>
                                <input type="text" class="form-control" id="client" name="client"
                                    placeholder="Enter client name" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Creative Brief</label>
                                <textarea class="form-control" rows="4" placeholder="Enter creative brief..." name="creative_brief" required></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>PIC</label>
                                <select class="form-control pic select2-orange" data-dropdown-css-class="select2-orange"
                                    style="width: 100%;" name="pic" required>
                                    <option></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Team Members</label>
                                <div class="select2-orange">
                                    <select class="form-control team select2" multiple="multiple"
                                        data-dropdown-css-class="select2-orange" style="width: 100%;" name="assisten"
                                        required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control status select2-orange" data-dropdown-css-class="select2-orange"
                                    style="width: 100%;" name="status" required>
                                    <option></option>
                                    <option value="Planning">Planning</option>
                                    <option value="On Going">On Going</option>
                                    <option value="Finished">Finished</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Urgency</label>
                                <select class="form-control urgency select2-orange" data-dropdown-css-class="select2-orange"
                                    style="width: 100%;" name="urgency" required>
                                    <option></option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-kraf float-right">
                        Create
                    </button>
                </div>
            </form>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.pic').select2({
                placeholder: "Select PIC",
                allowClear: true,
            })
            $('.team').select2({
                placeholder: "Select team member",
                allowClear: true,
            })
            $('.status').select2({
                placeholder: "Select status",
                allowClear: true,
            })
            $('.urgency').select2({
                placeholder: "Select urgency",
                allowClear: true,
            })
        })
    </script>
@endpush
