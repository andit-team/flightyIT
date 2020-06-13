@extends('admin.layout.app',['pageTitle' => __('Create Page')])
@section('content')

@include('elements.alert')
<form class="form-material form" action="{{ route('cms.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row pt-4">
            <div class="col-lg-9 col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group {{ $errors->has('page_title') ? ' has-danger' : '' }}">
                            <label for="page_title">Page Title</label>
                            <input type="text" name="page_title" value="{{old('page_title')}}" class="form-control" id="page_title"  placeholder="Page Title" required autocomplete="off">
                            @include('elements.feedback',['field' => 'page_title'])
                        </div>
                        <div class="form-group {{ $errors->has('page_url') ? ' has-danger' : '' }}">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text md-addon"><b>{{url('')}}/</b></span></div>
                            <input type="texts" name="page_url" value="{{old('page_url')}}" class="form-control" id="page_url"  placeholder="Page Url" required autocomplete="off">
                            </div>
                            @include('elements.feedback',['field' => 'page_url'])
                        </div>

                        
                        <div class="form-group {{ $errors->has('site_name') ? ' has-danger' : '' }}">
                            <textarea id="summernote" name="content"></textarea>
                            @include('elements.feedback',['field' => 'content'])
                        </div>

                        <div class="form-group {{ $errors->has('seo_title') ? ' has-danger' : '' }}">
                            <label for="seo_title">Seo Title</label>
                            <input type="text" name="seo_title" value="{{old('seo_title')}}" class="form-control" id="seo_title"  placeholder="Seo Title" required autocomplete="off">
                            @include('elements.feedback',['field' => 'seo_title'])
                        </div>
                        <div class="form-group {{ $errors->has('seo_keyword') ? ' has-danger' : '' }}">
                            <label for="seo_keyword">Seo Keyword</label>
                            <input type="text" name="seo_keyword" value="{{old('seo_keyword')}}" class="form-control" id="seo_keyword"  placeholder="Seo Title" required autocomplete="off">
                            @include('elements.feedback',['field' => 'seo_keyword'])
                        </div>
                        <div class="form-group {{ $errors->has('seo_description') ? ' has-danger' : '' }}">
                            <label for="seo_description">Seo Desctiprion</label>
                            <Textarea class="form-control" name="seo_description" rows="4"></Textarea>
                            @include('elements.feedback',['field' => 'seo_description'])
                        </div>

                    </div>
                </div>
            </div>
            {{-- {{dd(CMS::getPageTree())}} --}}
            <div class="col-lg-3 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="parent_id">Parent Page</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="0">(no parent)</option>
                                <?php echo CMS::getPageTree(0); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="template">Template</label>
                            <select name="template" id="template" class="form-control">
                                <?php echo CMS::getPageTemplates('page'); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                {!!Core::getOptionArray(['Publish'=>'Publish','Draft'=>'Deraft','Trash'=>'Trash'],old('status'))!!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="page_order">Page Order</label>
                            <input type="number" name="page_order" value="0" class="form-control" placeholder="Page Order">
                        </div>
                        
                        <button class="btn btn-lg btn-success w-100">Create Page</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group  no-margin">
                            <h3 class="box-title">Upload Feature Image</h3>
                        </div>
                        <div class="thumbnail upload_image">
                            <?php //echo getCMSPhoto($thumb, 'full'); ?>
                        <img class="img-responsive" src="{{asset('default.png')}}">
                        </div>
                        <div class="btn btn-default btn-file">
                            <i class="fa fa-picture-o"></i> Set Thumbnail
                            <input type="file" name="thumb" class="file_select" onchange="instantShowUploadImage(this, '.upload_image')">
                        </div>

                    </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
@push('css')
<link href="{{ asset('material') }}/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />

@endpush

@push('js')
<script src="{{ asset('material') }}/assets/plugins/summernote/dist/summernote.min.js"></script>
<script>
    function instantShowUploadImage(input, target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(target + ' img').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
    $(target).show();
}

jQuery(document).ready(function() {
    $("#page_title").on('keyup keypress blur change', function () {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp, '-');
        $("#page_url").val(Text);
        // $(".pageSlug").text(Text);
    });

    $('#summernote').summernote({
        height: 500, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });
});
</script>
@endpush