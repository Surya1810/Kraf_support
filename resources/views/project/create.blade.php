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
                    <h1>Project</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('project.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active"><strong>Create</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card rounded-kraf card-outline card-orange">
                    <div class="card-header">
                        <h3 class="card-title">Project Create</h3>
                    </div>
                    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Project name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter project name" required
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="client">Client name</label>
                                        <input type="text" class="form-control @error('client') is-invalid @enderror"
                                            id="client" name="client" placeholder="Enter client name" required
                                            value="{{ old('client') }}">
                                        @error('client')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Creative Brief</label>
                                        <textarea class="form-control @error('creative_brief') is-invalid @enderror" rows="4"
                                            placeholder="Enter creative brief..." name="creative_brief" required></textarea>
                                        @error('creative_brief')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>PIC</label>
                                        <select class="form-control pic select2-orange @error('pic') is-invalid @enderror"
                                            data-dropdown-css-class="select2-orange" style="width: 100%;" name="pic"
                                            required>
                                            <option></option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($user->id == old('user')) selected @endif>{{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Team Members</label>
                                        <div class="select2-orange">
                                            <select
                                                class="form-control team select2 @error('assisten') is-invalid @enderror"
                                                multiple="multiple" data-dropdown-css-class="select2-orange"
                                                style="width: 100%;" name="assisten[]" required>
                                                @foreach ($users as $user)
                                                    @if (old('assisten'))
                                                        <option value="{{ $user->id }}"
                                                            {{ in_array($user->id, old('assisten')) ? 'selected' : '' }}>
                                                            {{ $user->name }}</option>
                                                    @else
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('assisten')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select
                                            class="form-control status select2-orange @error('status') is-invalid @enderror"
                                            data-dropdown-css-class="select2-orange" style="width: 100%;" name="status"
                                            required>
                                            <option></option>
                                            <option value="Planning" @if ($user->id == old('status')) selected @endif>
                                                Planning</option>
                                            <option value="On Going">On Going</option>
                                            <option value="Finished">Finished</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Urgency</label>
                                        <select
                                            class="form-control urgency select2-orange @error('urgency') is-invalid @enderror"
                                            data-dropdown-css-class="select2-orange" style="width: 100%;" name="urgency"
                                            required>
                                            <option></option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                        @error('urgency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
            </div>
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
