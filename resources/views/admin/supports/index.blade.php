@extends('layouts.layout')

@section('title', 'Support')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mt-4">

      @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          {{session('message')}}
        </div>
      @endif

      <div class="card">
        <div class="card-body">

          <a href="{{route('supports.create')}}" class="btn btn-secondary">Cadastrar</a>

          <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Assunto</th>
                <th scope="col">Status</th>
                <th scope="col">Descrição</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($supports as $support)
                <tr>
                  <th scope="row">1</th>
                  <td>{{$support->subject}}</td>
                  <td>{{$support->status}}</td>
                  <td>{{$support->body}}</td>
                  <td>
                    <a href="{{route('supports.show', $support->id)}}" class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i></a>
                    <a href="{{route('supports.edit', $support->id)}}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                  </td>
                </tr>   
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
    
