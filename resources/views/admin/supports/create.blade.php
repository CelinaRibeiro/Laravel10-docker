@extends('layouts.layout')

@section('title', 'Support - Cadastrar')

@section('content')
  <div class="container card col-md-10 m-4">
    <form action="{{route('supports.store')}}" method="POST">
      @csrf
      <div class="row m-2">
        <div class="col-md-10 mt-2">
          <label for="subject">Assunto</label>
          <input type="text" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" name="subject" value="{{old('subject')}}">
          <div class="invalid-feedback">{{ $errors->first('subject')}}</div>
        </div>
        <div class="col-md-10 mt-2">
          <label for="body">Descrição</label>
          <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" cols="30" rows="10">{{old('body')}}</textarea>
          <div class="invalid-feedback">{{ $errors->first('body')}}</div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary m-2">Salvar</button>
      <a href="{{route('supports.index')}}" class="btn btn-sm btn-secondary m-2">Voltar</a>
    </form>
  </div>
@endsection
