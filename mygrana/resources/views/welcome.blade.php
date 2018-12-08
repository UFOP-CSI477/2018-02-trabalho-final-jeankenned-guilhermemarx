@extends('mylayout')
@extends('perfil')

@section('titulo','MyGrana HomePage')

@section('content')
@foreach($categorias as $c)
<div class="w3-col m9 w3-right">


  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <h4><strong>{{ $c->nome }}</strong></h4><br>
    <hr class="w3-clear">
    <p>Aqui será exibido formulários, informações, gráficos, qlqr coisa do tipo</p>

    <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
    <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
  </div>

  <!-- End Middle Column -->
</div>

@endforeach
@endsection
