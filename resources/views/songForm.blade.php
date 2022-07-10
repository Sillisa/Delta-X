@extends('layouts.site')
@section('content')


<div class="content-wrapper">
    <form
        action="{{ route('addSongForm') }}" class="form-horizontal" id="eventForm" method="post" enctype="multipart/form-data">

        <div class="card">
            <div class="card-header card-header-sticky">
                <h3 class="card-title" style="font-size: 1.6em">Add Event
                <div class="card-tools float-right">
                    <button type="submit" name="add" class="btn btn-info btn-sm btn-badge">Save <i
                            class="fa fa-check"></i></button>
                    |
                    <a href="{{ url('/') }}" class="btn btn-warning btn-sm btn-badge"><i
                            class="right fa fa-angle-left"></i> Back </a>
                </div>
            </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="card card-info">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="songName" class="col-sm-2 col-form-label">Song Name<span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input id="songName"
                                    name="songName" type="text"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="releaseDate" class="col-sm-2 col-form-label">Release Date<span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input id="releaseDate"
                                    name="releaseDate" type="date"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="releaseDate" class="col-sm-2 col-form-label">Artist<span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                                <select class="form-control" name="artist[]" multiple>
                                    <option value=""selected disabled>Select Artist</option>
                                    @foreach ($artist as $item)
                                        <option value="{{ $item->id }}">{{ $item->artistName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add Artist</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="artWork" class="col-sm-2 col-form-label">Artwork Image</label>
                            <div class="col-md-6">
                                <input id="artWork" name="artWork" type="file" class="form-control hide image" >
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </form>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
	  <div class="modal-content">
		<div class="modal-header" >
		 <h4>Add Artist</h4>
	   </div>
       <form
        action="{{ route('addArtistForm') }}" class="form-horizontal" method="post">
        @csrf
        <div class="modal-body" id="alert_message_div_message">
                <div class="form-group row">
                    <label for="artistName" class="col-sm-2 col-form-label">Artist Name<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input id="artistName" name="artistName" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dob" class="col-sm-2 col-form-label">D.O.B<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input id="dob" name="dob" type="date" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dob" class="col-sm-2 col-form-label">Bio<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="bio" id="bio" cols="30" rows="10"></textarea>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn badge btn-primary">Save</button>
        </div>
       </form>
	</div>
  </div>
  </div>

@endsection