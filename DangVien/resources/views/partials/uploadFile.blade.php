<form action="{{ route($route) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        <div class="input-file-container">
            <button class="icon-file-upload"><i class="fas fa-upload"></i></button>
            <input name="file" class="input-file" id="my-file" type="file">
        </div>
    </div>
    <div class="col-12">
        <input class="btn_gui" type="submit" value="tải lên">
    </div>
</form>
@if (session('success'))
<div class="alert alert-success notification">
    {{ session('success') }}
</div>
@endif
