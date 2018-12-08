@extends('layouts.mylayout')
@extends('perfil')

@section('titulo','Listagem')

@section('content')
<?php
$total = 0.00;
?>
<div class="w3-col m9 w3-right">


  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <h4><strong>Lista de Gastos e Rendas</strong></h4><br>
    <hr class="w3-clear">
    <table class="w3-table-all">
      <thead>
        <tr class="w3-theme-l1">
          <th><strong>Descrição</strong></th>
          <th><strong>Data</strong></th>
          <th><strong>Categoria</strong></th>
          <th><strong>Valor</strong></th>
          <th><strong>Ações</strong></th>
          <th></th>

        </tr>
      </thead>

      <tbody>
        @foreach($transacoes as $t)
        <tr>
          <td>{{ $t->descricao }}</td>
          <td><?php echo date('d/m/Y',strtotime($t->data)) ?></td>
          <td>{{ $t->categoria->nome }}</td>

          <td><strong class="<?php
          if ($t->categoria_id == 1 || $t->categoria_id == 2){
            echo "w3-text-theme";
          }else{
            echo "w3-text-red";
          }?>">{{ "R\$ " . number_format($t->valor,2,',','.') }}<strong>
          </td>

          <td>
            <form action="{{ route('transacao.edit', $t->id) }}" >
              <Button class="btn btn-warning" id="edit" type="submit" name="edit" value="edit" >Editar</Button>
            </form>
          </td>

          <td>
            <form method="post" action="{{ route('transacao.destroy', $t->id) }}" >
              @csrf
              @method('DELETE')
              <Button class="btn btn-danger" id="edit" type="submit" name="destroy" value="destroy" >Excluir</Button>
            </form>

          </td>
        </tr>
        @endforeach

      </tbody>


      </table


    </div>

    <!-- End Middle Column -->
  </div>


  @endsection
