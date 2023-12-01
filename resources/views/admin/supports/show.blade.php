@extends('layouts.layout')

@section('title', 'Support - Visualizar')

@section('content')
  <div class="container card col-md-8 m-4">
    <div class="row">
      <div class="col-md-4 mt-4">
        <h6>Assunto: {{$support->subject}}</h6>
        <p class="mt-4">Status: {{$support->status}}</p>
        <p>Descrição: {{$support->body}}</p>
       
        <a href="{{route('supports.index')}}" class="btn btn-sm btn-secondary mb-4">Voltar</a>
        <form action="{{route('supports.destroy', $support->id)}}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-sm btn-danger mb-4">Excluir</button>
        </form>
      </div>
    </div>
  </div>
@endsection
