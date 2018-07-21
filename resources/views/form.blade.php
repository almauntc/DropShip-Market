<head>
	@include('includes.head')
</head>

<div class="small-12 large-12 column login-form">
	{{ Form::open() }}
	<fieldset>
		<legend>Form dilaravel</legend>
		{{ Form::label('nama','Nama') }}
		{{ Form::text('nama',null,['placeholder'=>'Isikan nama anda']) }}
		{{ Form::label('alamat','Alamat') }}
		{{ Form::text('alamat',null,['placeholder'=>'Isikan alamat anda']) }}
		{{ Form::submit('Save',['class'=>'button tiny radius']) }}
	</fieldset>
	{{ Form::close() }}
</div>