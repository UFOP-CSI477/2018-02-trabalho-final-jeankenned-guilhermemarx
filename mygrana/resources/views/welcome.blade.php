@extends('mylayout')

@section('titulo','MyGrana HomePage')

@section('userName')
{{ $user->name }}
@endsection

@section('Rendas')
<?php
  $renda = 0.0;

  foreach ($user->transacoes as $t) {
    if ($t->tipo == 0)
      $renda=$renda+$t->valor;
  }

  echo "R\$ " . $renda;



 ?>
@endsection

@section('Gastos')
<?php
  $gasto = 0.0;

  foreach ($user->transacoes as $t) {
    if ($t->tipo == 1)
      $gasto=$gasto+$t->valor;
  }

  echo "R\$ " . $gasto;



 ?>
@endsection

@section('LiquidoIcone')
<?php
  if($renda >= $gasto)
    echo "fa-thumbs-up";
  else echo "fa-thumbs-down";
 ?>
@endsection

@section('LiquidoCorIcone')
<?php
  if($renda >= $gasto)
    echo "w3-text-theme";
  else echo "w3-text-red";
 ?>
@endsection

@section('LiquidoCorValor')
<?php
  if($renda >= $gasto)
    echo "w3-text-theme";
  else echo "w3-text-red";
 ?>
@endsection

@section('LiquidoValor')

<?php
  if($renda >= $gasto)
    echo "R\$ " . ($renda-$gasto);
  else echo "R\$ " . ($gasto-$renda);

?>

@endsection
