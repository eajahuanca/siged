<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="{{ $errors->has('cur_nombre')?' has-error':'' }}">
            {{ Form::label('cur_nombre', 'Nombre del Curso') }}    
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="ace-icon fa fa-bars"></i>
                </span>
                {{ Form::text('cur_nombre',null, ['class' => 'form-control', 'placeholder' => 'ingrese nombre del curso']) }}
            </div>
            @if($errors->has('cur_nombre'))
                <span style="color:red;">
                    <strong>{{ $errors->first('cur_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div>
            {{ Form::label('cur_estado', 'Estado del Curso') }}
            {{ Form::select('cur_estado', [true => 'Activo', false => 'Bloqueado'],null, ['class' => 'chosen-select form-control']) }}
        </div>
    </div>
</div>