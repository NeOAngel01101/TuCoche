<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
    <li class="breadcrumb-item active">Modificar Perfil</li>
</ol>

{{ method_field('PATCH') }}
<div class="container" >
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Profile</div>
                <div class="card-body">

                    <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-lg-4 col-form-label text-lg-right">Nick</label>
                        <div class="col-md-6">
                            <input id="username" class="form-control" type="text" name="username" placeholder="{{ $user->username }}">
                            @if ($errors->has('username'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-lg-4 col-form-label text-lg-right">Nombre</label>
                        <div class="col-md-6">
                            <input id="name" class="form-control" placeholder="{{ $user->name }}" type="text" name="name">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('apellido') ? ' has-error' : '' }}">
                        <label for="apellido" class="col-lg-4 col-form-label text-lg-right">Apellido</label>
                        <div class="col-md-6">
                            <input id="apellido" class="form-control" type="text" name="apellido" placeholder="{{ $user->apellido }}">
                            @if ($errors->has('apellido'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('telefonomovil') ? ' has-error' : '' }}">
                        <label for="telefonomovil" class="col-lg-4 col-form-label text-lg-right">Telefono</label>
                        <div class="col-md-6">
                            <input id="telefonomovil" class="form-control" type="number" name="telefonomovil" placeholder="{{ $user->telefonomovil }}">
                            @if ($errors->has('telefonomovil'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('telefonomovil') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('tipo') ? ' has-error' : '' }}">
                        <label for="tipo" class="col-md-4 col-form-label text-lg-right">Tipo de vendedor</label>
                        <div class="col-md-6">
                            <select name="tipo" class="custom-select custom-select-lg mb-3" id="tipo" title="tipo">
                                <option selected>{{ $user->tipo }}</option>
                                <option value="Particular">Particular</option>
                                <option value="Profesional">Profesional</option>
                            </select>
                            @if($errors->has('tipo'))
                                @foreach($errors->get('tipo') as $message)
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('web') ? ' has-error' : '' }}">
                        <label for="web" class="col-lg-4 col-form-label text-lg-right">Web</label>
                        <div class="col-md-6">
                            <input id="web" class="form-control" type="text" name="web" placeholder="{{ $user->web }}">
                            @if ($errors->has('web'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('web') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                        <label for="descripcion" class="col-lg-4 col-form-label text-lg-right">Descripcion</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="descripcion" id="descripcion" rows="5" >{{ $user->descripcion }}</textarea>
                            @if ($errors->has('descripcion'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-lg-4 col-form-label text-lg-right">Email</label>
                        <div class="col-md-6">
                            <input id="email" class="form-control" type="text" name="email" placeholder="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
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
