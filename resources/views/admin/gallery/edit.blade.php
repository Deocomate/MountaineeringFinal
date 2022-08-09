@extends('admin.main')
@section('title', 'Edit Image')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Image</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{ route('admin.gallery.update',['id'=>$data->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label>Ảnh hiện tại</label>
                                    <input type="text" disabled value="{{$data->img_link}}" name="old_img" id="" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Ảnh mới</label>
                                    <input class="form-control" type="file" id="formFile" name="img_link">
                                </div>
                                <div class="form-group">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                                            name="title">{{$data->title}}</textarea>
                                        <label for="floatingTextarea2">Tiêu đề cập nhật</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Categorie</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="category_id">
                                                <option disabled>Open this select menu</option>
                                                @foreach ($categoryOPT as $item)
                                                    @if ((int) $item->id == (int) $data->category_id)
                                                        <option selected value="{{ $item->id }}">{{ $item->cate_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{ $item->cate_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Tag</label>
                                            <select class="form-select" aria-label="Default select example" name="tag_id">
                                                <option disabled>Open this select menu</option>
                                                @foreach ($tagOPT as $item)
                                                    @if ((int) $item->id == (int) $data->tag_id)
                                                        <option selected value="{{ $item->id }}">{{ $item->tag_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{ $item->tag_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning">Update Image</button>
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
