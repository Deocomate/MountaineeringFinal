@extends('admin.main')
@section('title', 'Update Blog')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" enctype="multipart/form-data" action="{{ route('admin.blogs.update', ['id'=>$data->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Ảnh cũ của bài viết</label>
                                    <input value="{{$data->thumbnail}}" type="text" name="old_thumbnail" class="form-control fw-bold" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label" aria-valuemax="">Ảnh đại diện cho bài viết mới</label>
                                    <input class="form-control" type="file" id="formFile" name="thumbnail">
                                </div>
                                <div class="form-group">
                                    <label for="">Tiêu đề của bài viết</label>
                                    <input value="{{$data->heading}}" type="text" name="heading" class="form-control fw-bold fs-5">
                                </div>
                                <div class="form-group">
                                    <label for="">Tiêu đề phụ</label>
                                    <input value="{{$data->heading2}}" type="text" name="heading2" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="title">{{$data->title}}</textarea>
                                        <label for="floatingTextarea2">Thêm mô tả ở đây</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="content" id="editor" placeholder="Nội dung bài viết!">
                                        {{$data->content}}
                                    </textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Người viết bài</label>
                                            <input type="text" name="author" id=""
                                                class="form-control" value="{{$data->author}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Địa điểm nhắc đến</label>
                                            <input type="text" name="locate" id=""
                                                class="form-control" value="{{$data->locate}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning">Update</button>
                                </div>
                            </form>
                        </div>
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
