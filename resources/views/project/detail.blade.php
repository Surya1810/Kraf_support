@extends('layouts.admin')

@section('title')
    Project Detail
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
                        <li class="breadcrumb-item active"><strong>Detail</strong></li>
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
                                    <a class="nav-link rounded link-kraf active" id="project-tab" data-toggle="pill"
                                        href="{{ route('project.detail', $project->kode) }}" role="tab"
                                        aria-controls="project" aria-selected="true">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-kraf" id="task-tab" data-toggle="pill"
                                        href="{{ route('project.task', $project->kode) }}" role="tab"
                                        aria-controls="task" aria-selected="false">Task</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="project" role="tabpanel"
                                    aria-labelledby="project-tab">

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
