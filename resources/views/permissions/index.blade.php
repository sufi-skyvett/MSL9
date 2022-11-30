@extends('layouts.defaultlayout')

@section('contentheader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Permissions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Permission</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $message }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex p-0">
            <h3 class="card-title p-3">Permissions</h3>
            {{-- <a class="btn btn-success btn-sm"  href="{{ route('pasukan.create') }}">Pasukan Baru</a> --}}
            <ul class="p-2">
                <a class="btn btn-success" href="{{ route('permissions.create') }}">Create Permission</a>
            </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key => $permission)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info" href="{{ route('permissions.show', $permission->id) }}">
                                        <img src="{{ url('/images/open.png') }}" width="17" height="17"
                                            alt="Image" />
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('permissions.edit', $permission->id) }}">
                                        <img src="{{ url('/images/edit.png') }}" width="17" height="17"
                                            alt="Image" />
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#DeleteAkaunCenter{{ $permission->id }}"
                                        data-id="{{ $permission->id }}">
                                        <img src="{{ url('/images/delete.png') }}" width="17" height="17"
                                            alt="Image" />
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="DeleteAkaunCenter{{ $permission->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Padam Peranan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sahkan padam peranan?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-danger">
                                                        <img src="{{ url('/images/delete.png') }}" width="17"
                                                            height="17" alt="Image" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['pasukan.destroy', $pasukan->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!} --}}
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true,
                "buttons": ["csv", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
