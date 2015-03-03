<div class="modal-dialog">
<div class="modal-content">
@foreach ($category->texts as $text)
<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <button type="button" class="close" data-dismiss="modal" style="font-size:52px;" aria-hidden="true">&times;</button>
        <h2 style="text-transform:uppercase;">{{ $text->title }}</h2>
        <hr />
        {{ $text->content }}
        </div>
    </div>
</div>
@endforeach
</div>
</div>