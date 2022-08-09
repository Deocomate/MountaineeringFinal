@extends('admin.main')
@section('title', 'Tags & Categories')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tags & Categories</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tag Name</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $item)
                                        <tr>
                                            <td>{{ $item->tag_name }}</td>
                                            <td><a href="{{ route('admin.tag.edit', ['id'=>$item->id]) }}"><button class="btn btn-warning">Update</button></a></td>
                                            <td><a href="{{ route('admin.tag.del', ['id'=>$item->id]) }}"><button class="btn btn-danger">Delete</button></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $tags->appends(Request::all())->links('pagination::bootstrap-5') }}
                        </div>
                        <div class="col-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Categories Name</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item )
                                    <tr>
                                        <td>{{$item->cate_name}}</td>
                                        <td><a href="{{ route('admin.category.edit', ['id'=>$item->id]) }}"><button class="btn btn-warning">Update</button></a></td>
                                        <td><a href="{{ route('admin.category.del', ['id'=>$item->id]) }}"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->appends(Request::all())->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Tag</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <form action="{{ route('admin.tag.add') }}" method="POST">
                            <label for="">Tag Name</label>
                            <input type="text" name="tag_name" id="" class="form-control mb-3">
                            <div class="form-group">
                                <button class="btn btn-success">Add</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <form action="{{ route('admin.category.add') }}" method="post">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" id="" class="form-control mb-3">
                            <div class="form-group">
                                <button class="btn btn-success">Add</button>
                            </div>
                            @csrf
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
