@extends('app')

@section('content')
    <div class="container">

        <h3>Edição do Produto: {{$product->name}}</h3>

        @include('errors._check')

        {!! Form::model($product, ['route'=>['products.update', $product->id], 'method' => 'put']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
            <a href="{{route('products.index')}}" class="btn btn-default">Voltar</a>
        </div>

        {!! Form::close() !!}

    </div>


@endsection