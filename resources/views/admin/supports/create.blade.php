@extends('layouts.layout')

@section('title', 'Support - Cadastrar')

@section('content')
  <div class="container card col-md-10 m-4">
    <form action="{{route('supports.store')}}" method="POST">
      @csrf
      <div class="row m-2">
        <div class="col-md-10 mt-2">
          <label for="subject">Assunto</label>
          <input type="text" class="form-control" name="subject">
        </div>
        <div class="col-md-10 mt-2">
          <label for="body">Descrição</label>
          <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary m-2">Enviar</button>
    </form>
  </div>
@endsection
