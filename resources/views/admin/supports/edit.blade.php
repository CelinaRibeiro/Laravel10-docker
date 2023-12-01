@extends('layouts.layout')

@section('title', 'Support - Cadastrar')

@section('content')
  <div class="container card col-md-10 m-4">
    <form action="{{route('supports.update', $support->id)}}" method="POST">
      @method('PUT')
      @csrf
      <div class="row m-2">
        <div class="col-md-10 mt-2">
          <label for="subject">Assunto</label>
          <input type="text" class="form-control" name="subject" value="{{$support->subject}}">
        </div>
        <div class="col-md-10 mt-2">
          <label for="body">Descrição</label>
          <textarea name="body" class="form-control" cols="30" rows="10" >{{$support->body}}</textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-sm btn-primary m-2">Salvar</button>
      <a href="{{route('supports.index')}}" class="btn btn-sm btn-secondary m-2">Voltar</a>
    </form>
  </div>
@endsection
