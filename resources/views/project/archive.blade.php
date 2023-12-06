@extends('layouts.admin')

@section('title')
    Project Archive
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
                    <h1>Project Archive</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-black-50"
                                href="{{ route('project.index') }}">Projects</a></li>
                        <li class="breadcrumb-item active"><strong>Archive</strong></li>
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
                                    <h3 class="card-title">Project Archive</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="projectTable" class="table table-bordered text-nowrap">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 55%">
                                            Project Name
                                        </th>
                                        <th style="width: 15%">
                                            Start Date
                                        </th>
                                        <th style="width: 15%">
                                            Due Date
                                        </th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td class="text-wrap">{{ $project->name }}</td>
                                            <td>{{ $project->start->toFormattedDateString('d/m/y') }}</td>
                                            <td>{{ $project->deadline->toFormattedDateString('d/m/y') }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info rounded-kraf"
                                                    href="{{ route('project.detail', $project->kode) }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                    View
                                                </a>
                                                <button class="btn btn-sm btn-warning rounded-kraf"
                                                    onclick="restoreProject({{ $project->id }})"><i
                                                        class="fa-solid fa-circle-left"></i></i> Restore</button>
                                                <form id="delete-form-{{ $project->id }}"
                                                    action="{{ route('project.undone', $project->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('POST')
                                                </form>
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

        function restoreProject(id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Restore'
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
    </script>
@endpush
