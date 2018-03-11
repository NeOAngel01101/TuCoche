{{ method_field('PATCH') }}
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cambiar Contraseña </div>
                <div class="card-body">
                        <div class="form-group row{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="current_password" class="col-lg-4 col-form-label text-lg-right">Contraseña Actual</label>
                            <div class="col-md-6">
                                <input id="current_password" class="form-control" type="password" name="current_password" >
                                @if ($errors->has('current_password'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right">Nueva Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="col-lg-4 col-form-label text-lg-right">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >
                                @if ($errors->has('password_confirmation'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit"  class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
