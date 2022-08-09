@extends('admin.main')
@section('title', 'Edit Tag')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Tag</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <form action="{{ route('admin.tag.update', ['id'=>$id]) }}" method="POST">
                            @csrf
                            <label for="">Edit Tag Name</label>
                            <input type="text" name="tag_name" id="" class="form-control mb-3" value="{{$data->tag_name}}">
                            <div class="form-group">
                                <button class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="script">
        <script src="{{ asset('lib/ckeditor/build/ckeditor.js') }}"></script>
        <script src="{{ asset('lib/ckfinder/ckfinder.js') }}"></script>
    </div>
@endsection
