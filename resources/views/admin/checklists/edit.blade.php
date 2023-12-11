@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.checklist.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.checklists.update", [$checklist->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="chk_name">{{ trans('cruds.checklist.fields.chk_name') }}</label>
                <input class="form-control {{ $errors->has('chk_name') ? 'is-invalid' : '' }}" type="text" name="chk_name" id="chk_name" value="{{ old('chk_name', $checklist->chk_name) }}" required>
                @if($errors->has('chk_name'))
                    <span class="text-danger">{{ $errors->first('chk_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.chk_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.checklist.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Checklist::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $checklist->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="users">{{ trans('cruds.checklist.fields.users') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || $checklist->users->contains($id)) ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <span class="text-danger">{{ $errors->first('users') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.users_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="farm_id">{{ trans('cruds.checklist.fields.farm') }}</label>
                <select class="form-control select2 {{ $errors->has('farm') ? 'is-invalid' : '' }}" name="farm_id" id="farm_id" required>
                    @foreach($farms as $id => $entry)
                        <option value="{{ $id }}" {{ (old('farm_id') ? old('farm_id') : $checklist->farm->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('farm'))
                    <span class="text-danger">{{ $errors->first('farm') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.farm_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="backup_cluster_id">{{ trans('cruds.checklist.fields.backup_cluster') }}</label>
                <select class="form-control select2 {{ $errors->has('backup_cluster') ? 'is-invalid' : '' }}" name="backup_cluster_id" id="backup_cluster_id">
                    @foreach($backup_clusters as $id => $entry)
                        <option value="{{ $id }}" {{ (old('backup_cluster_id') ? old('backup_cluster_id') : $checklist->backup_cluster->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('backup_cluster'))
                    <span class="text-danger">{{ $errors->first('backup_cluster') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.backup_cluster_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="backup_tracker_id">{{ trans('cruds.checklist.fields.backup_tracker') }}</label>
                <select class="form-control select2 {{ $errors->has('backup_tracker') ? 'is-invalid' : '' }}" name="backup_tracker_id" id="backup_tracker_id">
                    @foreach($backup_trackers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('backup_tracker_id') ? old('backup_tracker_id') : $checklist->backup_tracker->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('backup_tracker'))
                    <span class="text-danger">{{ $errors->first('backup_tracker') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.backup_tracker_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="domain_id">{{ trans('cruds.checklist.fields.domain') }}</label>
                <select class="form-control select2 {{ $errors->has('domain') ? 'is-invalid' : '' }}" name="domain_id" id="domain_id" required>
                    @foreach($domains as $id => $entry)
                        <option value="{{ $id }}" {{ (old('domain_id') ? old('domain_id') : $checklist->domain->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('domain'))
                    <span class="text-danger">{{ $errors->first('domain') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.domain_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="domain_user">{{ trans('cruds.checklist.fields.domain_user') }}</label>
                <input class="form-control {{ $errors->has('domain_user') ? 'is-invalid' : '' }}" type="text" name="domain_user" id="domain_user" value="{{ old('domain_user', $checklist->domain_user) }}" required>
                @if($errors->has('domain_user'))
                    <span class="text-danger">{{ $errors->first('domain_user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.domain_user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stlr_cases">{{ trans('cruds.checklist.fields.stlr_cases') }}</label>
                <input class="form-control {{ $errors->has('stlr_cases') ? 'is-invalid' : '' }}" type="text" name="stlr_cases" id="stlr_cases" value="{{ old('stlr_cases', $checklist->stlr_cases) }}" required>
                @if($errors->has('stlr_cases'))
                    <span class="text-danger">{{ $errors->first('stlr_cases') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.stlr_cases_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="details">{{ trans('cruds.checklist.fields.details') }}</label>
                <input class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" type="text" name="details" id="details" value="{{ old('details', $checklist->details) }}" required>
                @if($errors->has('details'))
                    <span class="text-danger">{{ $errors->first('details') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="checks">{{ trans('cruds.checklist.fields.checks') }}</label>
                <input class="form-control {{ $errors->has('checks') ? 'is-invalid' : '' }}" type="text" name="checks" id="checks" value="{{ old('checks', $checklist->checks) }}" required>
                @if($errors->has('checks'))
                    <span class="text-danger">{{ $errors->first('checks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.checks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.checklist.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $checklist->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.checklist.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Checklist::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $checklist->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.checklist.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.checklists.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $checklist->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection