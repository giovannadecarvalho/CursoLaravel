@extends('Layouts.LayoutFull')

@push('css')

@endpush
@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('book.store') }}" class="form-horizontal form-validate">
                        {{ csrf_field() }}
        {{-- <div class="form-group">
            <input type="checkbox">
            <label for="nome">Ativo </label>
          </div> --}}
        <div class="form-group">
          <label for="name">Nome: </label>
          <input id="name" type="text" value="{{ old("name") }}" required name="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="writer">Escritor:</label>
          <input id="writer" type= "text" name="writer" value="{{ old("writer") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="page_number">Número de páginas:</label>
            <input id="page_number" type="text" value="{{ old("page_number") }}" name="page_number" class="form-control">
        </div>
          <button type="submit" class='btn btn-success'>Enviar</button>
    </form>
@endsection
   @push('scripts')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#cpf").mask("999.999.999-99");
        });
</script>
</html>

