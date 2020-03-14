@extends('Layouts.LayoutFull')

@push('css')

@endpush
@if (Session::has('success'))
      toastr["success"]("<b>SUCESSO: </b><br>
      {{ Session::get('success') }});
@endif
@section('conteudo')
<a href="{{ route('book.create') }}" class="btn btn-success">Adicionar</a><br><br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Escritor</th>
        <th scope="col">Número de páginas</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <th scope="row">{{ $book->id }}</th>
            <td>{{ $book->name }}</td>
            <td>{{ $book->writer }}</td>
            <td>{{ $book->page_number }}</td>
            <td>
            <a href="{{ route('book.edit', [$book->id]) }}" class="btn btn-primary btn-sm text-white">
              <i class="fal fa-pencil"></i>
              <span class='d-done d-md-inline'>Editar</span>
            </a>
                <span data-url="{{ route('book.destroy', [$book->id]) }}" data-idBook='{{ $book->id }}' class="btn btn-danger btn-sm text-white deleteButton">
                  <i class="fal fa-trash"></i>
                  <span class='d-done d-md-inline'>Excluir</span>
                </span>
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

    $('.deleteButton').on('click', function (e) {
        var url = $(this).data('url');
        var idBook = $(this).data('idbook');
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            method: 'DELETE',
            url: url
        });
        $.ajax({
            data: {
                'idbook': idBook,
            },
            success: function (data) {
                console.log(data);
                if (data['status'] ?? '' == 'success') {
                    if (data['reload'] ?? '') {
                        location.reload();
                    }
                } else {
                   console.log('error');
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
      });

          
</script>
@endpush

