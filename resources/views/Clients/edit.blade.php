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
    <form method="POST" action="{{ route('client.update', [$client->id]) }}" class="form-horizontal form-validate">
                        {{ csrf_field() }}
                        @method('PUT')
          <div class="form-group form-check">
          <input id="active_flag" name="active_flag" type="checkbox" class="form-check-input" @if($client->active_flag) checkout='checked' @endif>
            <label class="form-check-label">Ativo</label>
        </div>
        <div class="form-group">
          <label for="name">Nome: </label>
          <input id="name" type="text" required name="name" class="form-control" placeholder="Ex.: Maria" value="{{ old("name", $client->name) }}">
        </div>
        <div class="form-group">
          <label for="cpf">CPF:</label>
          <input id="cpf" type= "text" name="cpf" class="form-control cpf-mask" placeholder="Ex.: 000.000.000-00" value="{{ old("cpf", $client->cpf) }}" >
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input id="email" type="text" name="email" class="form-control" placeholder="Ex.: teste@teste.com" value="{{ old("email", $client->email) }}">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input id="endereco" type="text" name="endereco" class="form-control" placeholder="Ex.: Bairro A, Rua B, 100" value="{{ old("email", $client->email) }}">
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

