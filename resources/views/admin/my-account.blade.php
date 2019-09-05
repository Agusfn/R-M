@extends('admin.layouts.main')

@section('title', 'Mi cuenta')


@section('content')
			
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Mi cuenta</h3>
				</div>
				<div class="panel-body">

					@if (\Session::has("success"))
					<div class="alert alert-success alert-dismissible" role="alert">
 	 					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						Los datos se actualizaron correctamente.
					</div> 
					@endif

					
					<form action="{{ route('admin.account') }}" method="POST">
						@csrf
						<div class="row" style="margin-top: 20px">
							<div class="col-sm-3 col-sm-offset-2">Nombre de usuario</div>
							<div class="col-sm-2">
								<div class="form-group @error('name') has-error @enderror">
									<input type="text" class="form-control" name="name" value="{{ $user->name }}">
	                                @error('name')
	                                    <span class="help-block">{{ $message }}</span>
	                                @enderror
                                </div>
							</div>
						</div>
						<div class="row" style="margin-top: 20px">
							<div class="col-sm-3 col-sm-offset-2">E-mail</div>
							<div class="col-sm-2">{{ $user->email }}</div>
						</div>
						<div class="row" style="margin-top: 20px">
							<div class="col-sm-3 col-sm-offset-2">Password</div>
							<div class="col-sm-2">
								<div class="form-group @error('current_password') has-error @enderror">
									<input type="password" class="form-control" name="current_password" placeholder="Contraseña actual">
	                                @error('current_password')
	                                    <span class="help-block">{{ $message }}</span>
	                                @enderror
								</div>
								<div class="form-group @error('new_password') has-error @enderror">
									<input type="password" class="form-control" name="new_password" placeholder="Contraseña nueva">
	                                @error('new_password')
	                                    <span class="help-block">{{ $message }}</span>
	                                @enderror
								</div>
								<input type="password" class="form-control" name="new_password_confirmation" placeholder="Repetir contraseña">
							</div>
						</div>					
						<div style="text-align: right; margin-top: 50px">
							<input type="submit" class="btn btn-primary" value="Guardar">
						</div>
					</form>

				</div>

			</div>


@endsection



@section('custom-js')
@endsection