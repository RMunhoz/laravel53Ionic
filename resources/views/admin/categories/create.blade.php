@extends('app')

@section('content')

    <div class="container">

        <h3>Nova Categoria</h3>

        @include('errors._check')

        {!! Form::open(['route'=>'categories.store']) !!}

            @include('admin.categories._form')

            <div class="form-group">
                {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                <a href="{{route('categories.index')}}" class="btn btn-default">Voltar</a>
            </div>

        {!! Form::close() !!}

    </div>

@endsection