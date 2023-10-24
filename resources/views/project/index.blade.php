@extends('layouts.admin')

@section('title')
    Project Management
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
                <h3 class="card-title">Projects</h3>
                <a href="{{ route('project.create') }}" class="btn btn-outline-dark rounded-kraf float-right">Create
                    Project</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 2%">
                                No
                            </th>
                            <th style="width: 20%">
                                Project Name
                            </th>
                            <th style="width: 10%">
                                PIC
                            </th>
                            <th style="width: 30%">
                                Team Members
                            </th>
                            <th style="width: 10%" class="text-center">
                                Status
                            </th>
                            <th style="width: 8%" class="text-center">
                                Urgency
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>
                                    <a>
                                        {{ $project->name }}
                                    </a>
                                    <br>
                                    <small>
                                        Created at {{ $project->created_at }}
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                        </li>
                                    </ul>
                                </td>
                                <td class="project-state">
                                    @if ($project->status === 'success')
                                        <span class="badge badge-success">{{ $project->status }}</span>
                                    @endif
                                </td>
                                <td class="project-state">
                                    @if ($project->status === 'success')
                                        <span class="badge badge-success">{{ $project->urgency }}</span>
                                    @endif
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('project.show', $project->kode) }}">
                                        <i class="fas fa-folder"></i>
                                        View
                                    </a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('project.edit', $project->kode) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('project.destroy', $project->kode) }}">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

@push('scripts')
@endpush
