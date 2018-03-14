<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
    <li class="breadcrumb-item active">Cambiar Avatar</li>
</ol>

{{ method_field('PATCH') }}
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cambiar Avatar</div>
                <div class="card-body">
                    <div class="form-group row{{ $errors->has('avatar') ? ' has-error' : '' }}">
                        <label for="avatar" class="col-lg-4 col-form-label text-lg-right">Introduzca el avatar</label>
                        <div class="col-md-6">
                            <input id="avatar" class="form-control" type="file" name="avatar">
                            @if ($errors->has('avatar'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 offset-lg-4">
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dialog" title="Es necesario">
    <p>Recuenda que las imagenes subidas tienen que ser en formado png y no ser mayores de 2mb</p>
</div>
@push('scripts')
    <script src="{{ asset('js/dialog.js') }}" defer></script>
@endpush