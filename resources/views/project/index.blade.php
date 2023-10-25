@extends('layouts.admin')

@section('title')
    Project
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>Project</strong></li>
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
                    <div class="card card-outline rounded-kraf card-orange">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title">Project List</h3>
                                </div>
                                @if (auth()->user()->id === 1 || 9)
                                    <div class="col-6">
                                        <a href="{{ route('project.create') }}"
                                            class="btn btn-sm btn-kraf rounded-kraf float-right">Create
                                            Project</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body table-responsive">
                                <table id="projectTable" class="table table-bordered text-nowrap">
                                    <thead class="table-dark">
                                        <tr>
                                            <th style="width: 2%">
                                                Code
                                            </th>
                                            <th style="width: 35%">
                                                Project Name
                                            </th>
                                            <th style="width: 13%">
                                                Created at
                                            </th>
                                            <th style="width: 13%">
                                                Due Date
                                            </th>
                                            {{-- <th style="width: 10%">
                                                PIC
                                            </th>
                                            <th style="width: 20%">
                                                Team Members
                                            </th> --}}
                                            <th style="width: 10%">
                                                Status
                                            </th>
                                            <th style="width: 10%">
                                                Urgency
                                            </th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>{{ $project->kode }}</td>
                                                <td class="text-wrap">{{ $project->name }}</td>
                                                <td>{{ $project->created_at->toFormattedDateString('d/m/y') }}</td>
                                                <td>{{ $project->deadline->toFormattedDateString('d/m/y') }}</td>
                                                {{-- <td>
                                                    <span class="badge badge-warning">
                                                        {{ $project->pic }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @php
                                                        $assisten = explode(',', $project->assisten);
                                                    @endphp

                                                    @foreach ($assisten as $user)
                                                        <span class="badge badge-secondary">
                                                            {{ $user }}
                                                        </span>
                                                    @endforeach
                                                </td> --}}
                                                <td class="text-center">
                                                    @if ($project->status === 'Finished')
                                                        <span class="badge badge-success">
                                                            {{ $project->status }}
                                                        </span>
                                                    @elseif ($project->status === 'On Going')
                                                        <span class="badge badge-info">
                                                            {{ $project->status }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-warning">
                                                            {{ $project->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($project->urgency === 'High')
                                                        <span class="badge badge-danger">
                                                            {{ $project->urgency }}
                                                        </span>
                                                    @elseif ($project->urgency === 'Medium')
                                                        <span class="badge badge-orange">
                                                            {{ $project->urgency }}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-warning">
                                                            {{ $project->urgency }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (auth()->user()->id === 1 || 9)
                                                        <a class="btn btn-sm btn-info rounded-kraf"
                                                            href="{{ route('project.detail', $project->kode) }}">
                                                            <i class="fas fa-folder"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-warning rounded-kraf"
                                                            href="{{ route('project.edit', $project->kode) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <button class="btn btn-sm btn-danger rounded-kraf"
                                                            onclick="deleteProject({{ $project->id }})"><i
                                                                class="fas fa-trash"></i></button>
                                                        <form id="delete-form-{{ $project->id }}"
                                                            action="{{ route('project.destroy', $project->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @else
                                                        <a class="btn btn-sm btn-info rounded-kraf"
                                                            href="{{ route('project.detail', $project->kode) }}">
                                                            <i class="fas fa-folder"></i>
                                                            View Project
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/jszip/jszip.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script> --}}
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $('#projectTable').DataTable({
                "paging": true,
                'processing': true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                // "scrollX": true,
                // width: "700px",
                // columnDefs: [{
                //     className: 'dtr-control',
                //     orderable: false,
                //     targets: -8
                // }]
            });
        });

        function deleteProject(id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe !',
                        'error'
                    )
                }
            })
        }


        @if (session('pesan'))
            @switch(session('level-alert'))
                @case('alert-success')
                toastr.success("{{ Session::get('pesan') }}", 'Success');
                @break

                @case('alert-danger')
                toastr.error("{{ Session::get('pesan') }}", 'Error');
                @break

                @default
                toastr.info('test', 'info');
            @endswitch
        @endif
    </script>
@endpush
