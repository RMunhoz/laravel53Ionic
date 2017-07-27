@extends('app')

@section('content')
    <div class="container">

        <h3>Edição da Categoria: {{$category->name}}</h3>

        @include('errors._check')

        {!! Form::model($category, ['route'=>['categories.update', $category->id], 'method' => 'put']) !!}

        @include('admin.categories._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
            <a href="{{route('categories.index')}}" class="btn btn-default">Voltar</a>
        </div>

        {!! Form::close() !!}

    </div>


@endsection