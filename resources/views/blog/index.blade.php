@extends('layouts.admin')

@section('title')
    Blog
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
                    <h1>Blog</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-black-50" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>Blog</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="small-box bg-kraf">
                        <div class="inner">
                            <h3>{{ $blogs->count() }}</h3>

                            <p>Our Content</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="small-box bg-kraf">
                        <div class="inner">
                            <h3>{{ $unpublished }}</h3>

                            <p>Our Pending Content This Month</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="small-box bg-kraf">
                        <div class="inner">
                            <h3>{{ $published }}</h3>

                            <p>Our Published Content This Month</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="small-box bg-kraf">
                        <div class="inner">
                            <h3>{{ $month }}</h3>

                            <p>Our Content This Month</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline rounded-kraf card-orange">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title">Content List</h3>
                                </div>
                                {{-- @if (auth()->user()->id == 1 || auth()->user()->id == 9) --}}
                                <div class="col-6">
                                    <a href="{{ route('blog.create') }}"
                                        class="btn btn-sm btn-kraf rounded-kraf float-right">Create
                                        Content</a>
                                </div>
                                {{-- @endif --}}
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="blogTable" class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width: 15%">
                                            Thumbnail
                                        </th>
                                        <th style="width: 30%">
                                            Title
                                        </th>
                                        <th style="width: 10%">
                                            Category
                                        </th>
                                        <th style="width: 10%">
                                            Tags
                                        </th>
                                        <th style="width: 15%">
                                            Created by
                                        </th>
                                        <th style="width: 5%">
                                            Status
                                        </th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $data)
                                        <tr>
                                            <td>
                                                {{ $data->title }}
                                            </td>
                                            <td>
                                                {{ $data->title }}
                                            </td>
                                            <td>
                                                {{ $data->category }}
                                            </td>
                                            <td>
                                                @php
                                                    $tags = explode(',', $data->tag);
                                                @endphp
                                                @foreach ($tags as $tag)
                                                    <span class="badge bg-kraf">{{ $tag }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a>{{ $data->user->username }}</a><br><small
                                                    class="text-muted">{{ $data->updated_at->toFormattedDateString('d/m/y') }}</small>
                                            </td>
                                            <td>
                                                @if ($data->status == true)
                                                    <span class="badge bg-green">Published</span>
                                                @else
                                                    <span class="badge bg-yellow">Pending</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if (auth()->user()->id == 1 || auth()->user()->id == 9)
                                                    <a class="btn btn-sm btn-success rounded-kraf"
                                                        href="{{ route('blog.status', $data->id) }}">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-warning rounded-kraf"
                                                        href="{{ route('blog.edit', $data->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    @if ($data->status == true)
                                                        <a class="btn btn-sm btn-info rounded-kraf" href="#"
                                                            target="_blank">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    @endif
                                                    <button class="btn btn-sm btn-danger rounded-kraf"
                                                        onclick="deleteBlog({{ $data->id }})"><i
                                                            class="fas fa-trash"></i></button>

                                                    <form id="delete-form-{{ $data->id }}"
                                                        action="{{ route('blog.destroy', $data->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @else
                                                    @if ($data->status == true)
                                                        <a class="btn btn-sm btn-info rounded-kraf" href="#">
                                                            <i class="fa-solid fa-eye"></i>
                                                            View Post
                                                        </a>
                                                    @endif
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
            $('#blogTable').DataTable({
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

        function deleteBlog(id) {
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
    </script>
@endpush
