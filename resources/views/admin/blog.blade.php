@extends('admin.admin')

@section('content')

@if(session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .container { padding: 1%; }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- فرم افزودن پست -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">ایجاد پست وبلاگ</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/dashboard/add_blog') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">عنوان</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" placeholder="عنوان پست" value="{{ old('title') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">عکس شاخص</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control-file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">متن</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="editor" class="form-control" rows="6">{{ old('content') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-success" type="submit">افزودن</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- لیست پست‌ها -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">پست‌های موجود</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blogs as $blog)
                                <tr>
                                    <td>
                                        @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" width="200" height="200">
                                        @endif
                                    </td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ jdate($blog->created_at)->format('Y/m/d') }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm"
                                            onclick="openEditModal({{ $blog->id }}, '{{ e($blog->title) }}', `{!! e($blog->content) !!}`)">
                                            ویرایش
                                        </button>

                                        <form action="{{ url('/admin/dashboard/delete_blog/' . $blog->id) }}" method="POST" style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('حذف شود؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4">هیچ پستی یافت نشد.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal برای ویرایش -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="{{ url('/admin/dashboard/update_blog') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="edit_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ویرایش پست</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>عنوان</label>
                        <input type="text" name="title" id="edit_title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>متن</label>
                        <textarea name="content" id="edit_content" class="form-control" rows="6"></textarea>
                    </div>

                    <div class="form-group">
                        <label>تغییر عکس (اختیاری)</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- CKEditor نسخه 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
    // CKEditor برای افزودن پست
    let editor;
    ClassicEditor
        .create(document.querySelector('#editor'), {
            language: 'fa',
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
        })
        .then(e => {
            editor = e;
        })
        .catch(error => {
            console.error(error);
        });

    // باز کردن Modal برای ویرایش پست
    function openEditModal(id, title, content) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_title').value = title;

        // استفاده از ClassicEditor برای تنظیم محتوا
        if (editor) {
            editor.destroy();  // پاک کردن ویرایشگر قبلی
        }

        ClassicEditor
            .create(document.querySelector('#edit_content'), {
                language: 'fa',
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo', 'alignment', 'fontSize', 'fontColor', 'highlight', 'removeFormat']
            })
            .then(editorInstance => {
                editorInstance.setData(content);  // بارگذاری داده‌های ویرایش شده
            })
            .catch(error => {
                console.error(error);
            });

        $('#editModal').modal('show');  // برای Bootstrap 4
    }
</script>

<!-- بارگذاری jQuery و Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
