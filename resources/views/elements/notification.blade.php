
@if(Session::has('message'))
<div class="m-2">
    <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible alert-alt fade show">
      <button type="button" class="close h-100" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
      </button>
      {{ Session::get('message') }}
    </div>
</div>

@endif

