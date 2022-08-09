@extends('admin.main')
@section('title', 'Edit Category')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <form action="{{ route('admin.category.update', ['id'=>$id]) }}" method="POST">
                            @csrf
                            <label for="">Category New Name</label>
                            <input type="text" name="cate_name" id="" value="{{$data->cate_name}}" class="form-control mb-3">
                            <div class="form-group">
                                <button class="btn btn-success">Update</button>
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
