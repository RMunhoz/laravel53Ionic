@extends('app')

@section('content')

    <div class="container">

        <h3>Novo Produto</h3>

        @include('errors._check')

        {!! Form::open(['route'=>'products.store']) !!}

            @include('admin.products._form')

            <div class="form-group">
                {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                <a href="{{route('products.index')}}" class="btn btn-default">Voltar</a>
            </div>

        {!! Form::close() !!}

    </div>

@endsection