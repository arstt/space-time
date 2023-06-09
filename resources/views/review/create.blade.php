@extends('layouts.backend')

@section('title', 'Review')

{{-- @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal.css">
@endsection --}}

@section('content')
<div class="card">

    <div class="section-header">
        <h1>Add Review</h1>
        <div class="section-header-button">
          <a href="{{route('reviews.index')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">
                <a href="{{route('reviews.index')}}">Review</a>
            </div>
            <div class="breadcrumb-item">Add Review</div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Opsi</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($destinations as $destination )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{asset('storage/'.$destination->image)}}" alt="" width="100px">
                        </td>
                        <td>{{$destination->name}}</td>
                        <td>{{$destination->latitude}}</td>
                        <td>{{$destination->longitude}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-destination="{{$destination->id}}">
                                Add Review
                              </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('reviews.create') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                    @csrf
                    <input type="hidden" name="destination_id" id="DestinationId">
                    <div class="form-group">
                        <label>Review Title</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Rating</label>
                        <input name="rating" type="number" class="form-control" max="5" min="1" placeholder="1 s/d 5" >
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="review" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Review</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('js')

<!-- Include jQuery -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget); // Button that triggered the modal
            var destination = button.data('destination'); // Extract info from data-* attributes

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
            modal.find('#DestinationId').val(destination);
        });
    });
</script>

@endsection
