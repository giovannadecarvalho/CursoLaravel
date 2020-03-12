@extends('Layouts.LayoutFull')

@push('css')

@endpush
@section('conteudo')
<a href class="btn btn-success">Adicionar</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">E-mail</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <th scope="row">{{ $client->id }}</th>
            <td>{{ $client->name }}</td>
            <td>{{ $client->cpf }}</td>
            <td>{{ $client->email }}</td>
            <td>
                <a href class='btn btn-primary btn-sm'>Editar</a>
                <a href class='btn btn-danger btn-sm'>Excluir</a></td>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
   @push('scripts')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
   
<script>
    $('.cpf-mask').mask('000.000.000-00');
</script>
</html>

