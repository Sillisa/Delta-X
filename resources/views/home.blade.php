@extends('layouts.site')
@section('content')


<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="font-size: 1.6em">Top Songs</h3>
            <div class="card-tools">
                <a href="{{ url('add-song') }}" class="btn btn-success badge">Add Songs<small><i
                            class="float-right fa fa-plus"></i></small></a>
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-sm table-striped">
                <thead>
                    <tr>
                    <tr><th>S.No</th>
                        <th><i class="fa fa-image"></i></th>
                        <th>Song</th>
                        <th>Date Of Release</th>
                        <th>Artist</th>
                        <th>Rating</th>
                    </tr>
                    </tr>
                </thead>
            </table>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
  </div>


<script>
    $(function() {
        $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('songs') }}",
            columns: [
                {
                    data: 'id'
                },
                {
                    data: 'img'
                },
                {
                    data: 'songName'
                },
                {
                    data: 'releaseDate'
                },
                {
                    data: 'artist'
                },
                {
                    data: 'rating'
                },
            ],
            columnDefs: [{
                    className: 'text-center',
                    targets: [0,4]
                },
                {
                    orderable: false,
                    targets: [0,4]
                },

            ],
            
        });
    });
</script>


@endsection