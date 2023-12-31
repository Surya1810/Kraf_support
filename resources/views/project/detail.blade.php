@extends('layouts.admin')

@section('title')
    Project Overview
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project - {{ $project->kode }}</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('project.index') }}">Project</a>
                        </li>
                        <li class="breadcrumb-item active"><strong>Overview</strong></li>
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
                    <div class="card card-primary card-outline card-outline-tabs rounded-kraf card-orange">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link rounded link-kraf active" id="tabs_project"
                                        href="{{ route('project.detail', $project->kode) }}" role="tab"
                                        aria-controls="tabs_project" aria-selected="true">Overview</a>
                                </li>
                                @if ($project->status != 'Finished')
                                    <li class="nav-item">
                                        <a class="nav-link link-kraf" id="tabs_task"
                                            href="{{ route('project.task', $project->kode) }}" role="tab"
                                            aria-controls="tabs_task" aria-selected="false">Task Step</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link link-kraf" id="tabs_review"
                                        href="{{ route('project.review', $project->kode) }}" role="tab"
                                        aria-controls="tabs_review" aria-selected="false">Review</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="project" role="tabpanel"
                                    aria-labelledby="tabs_project">
                                    <h5>Project - <strong>{{ $project->name }}</strong></h5>

                                    {{-- <div class="row">
                                        <div class="col-6">
                                            <h4>{{ $project->name }}</h4>
                                            <h4>{{ $project->creative_brief }}</h4>
                                            <h4>{{ $pic->name }}</h4>
                                            <h4>
                                                @foreach ($team as $data)
                                                    {{ $data->name }}
                                                @endforeach
                                            </h4>
                                            <h4>{{ $project->status }}</h4>
                                            <h4>{{ $project->urgency }}</h4>
                                            <h4>{{ $project->client }}</h4>
                                            <h4>{{ $project->deadline->toFormattedDateString('d/m/y') }}</h4>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4>Project Name</h4>
                                                    {{ $project->name }}
                                                    <h4>Client Name</h4>
                                                    {{ $project->client }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card bg-kraf">
                                                <div class="card-body">
                                                    <h4>Creative Brief</h4>
                                                    {{ $project->creative_brief }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card bg-kraf">
                                                <div class="card-body">
                                                    <h4>PIC</h4>
                                                    {{ $pic->username }}
                                                    <h4>Team</h4>
                                                    @foreach ($team as $data)
                                                        {{ $data->username }}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
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
