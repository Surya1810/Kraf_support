@extends('layouts.admin')

@section('title')
    Edit Project
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
                        <li class="breadcrumb-item active"><strong>Edit</strong></li>
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
                        <h3 class="card-title">Project Edit</h3>
                    </div>
                    <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Project name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Enter project name"
                                            value="{{ $project->name }}">
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
                                            id="client" name="client" placeholder="Enter client name"
                                            value="{{ $project->client }}">
                                        @error('client')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="creative_brief">Creative Brief</label>
                                        <textarea class="form-control @error('creative_brief') is-invalid @enderror" rows="4"
                                            placeholder="Enter creative brief..." id="creative_brief" name="creative_brief">{{ $project->creative_brief }}</textarea>
                                        @error('creative_brief')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pic">PIC</label>
                                        <select class="form-control pic select2-orange is-invalid"
                                            data-dropdown-css-class="select2-orange" style="width: 100%;" id="pic"
                                            name="pic">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $project->pic == $user->id ? ' selected' : '' }}>
                                                    {{ $user->username }}</option>
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
                                        <label for="assisten">Team Members</label>
                                        <div class="select2-orange">
                                            <select
                                                class="form-control team select2 @error('assisten') is-invalid @enderror"
                                                multiple="multiple" data-dropdown-css-class="select2-orange"
                                                style="width: 100%;" id="assisten" name="assisten[]">
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
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select
                                            class="form-control status select2-orange @error('status') is-invalid @enderror"
                                            data-dropdown-css-class="select2-orange" style="width: 100%;" id="status"
                                            name="status">
                                            <option></option>
                                            <option value="Discussion"
                                                {{ $project->status == 'Discussion' ? 'selected' : '' }}>
                                                Discussion</option>
                                            <option value="Planning"
                                                {{ $project->status == 'Planning' ? 'selected' : '' }}>
                                                Planning</option>
                                            <option value="On Going"
                                                {{ $project->status == 'On Going' ? 'selected' : '' }}>On
                                                Going</option>
                                            <option value="Finished"
                                                {{ $project->status == 'Finished' ? 'selected' : '' }}>
                                                Finished</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="urgency">Urgency</label>
                                        <select
                                            class="form-control urgency select2-orange @error('urgency') is-invalid @enderror"
                                            data-dropdown-css-class="select2-orange" style="width: 100%;" id="urgency"
                                            name="urgency">
                                            <option></option>
                                            <option value="High" {{ $project->urgency == 'High' ? 'selected' : '' }}>
                                                High
                                            </option>
                                            <option value="Medium" {{ $project->urgency == 'Medium' ? 'selected' : '' }}>
                                                Medium
                                            </option>
                                            <option value="Low" {{ $project->urgency == 'Low' ? 'selected' : '' }}>
                                                Low
                                            </option>
                                        </select>
                                        @error('urgency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="deadline">Due Date</label>

                                        <input type="date" class="form-control @error('deadline') is-invalid @enderror"
                                            id="deadline" name="deadline"
                                            value="{{ $project->deadline->format('Y-m-d') }}">

                                        @error('deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer rounded-kraf">
                            <button type="submit" class="btn btn-kraf float-right">
                                Update
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
                minimumResultsForSearch: -1,
                allowClear: true,
            })
            $('.urgency').select2({
                placeholder: "Select urgency",
                minimumResultsForSearch: -1,
                allowClear: true,
            })
        })
    </script>
@endpush
