@extends('layouts.mylayout')
@extends('perfil')

@section('titulo','Adicionar Gasto')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="w3-col m8">
            <div class="card">
                <div class="card-header w3-theme-l1">{{ __('Editar Renda') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('transacao.update',$transacao->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control" name="descricao" value="{{$transacao->descricao}}"required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Valor') }}</label>

                            <div class="col-md-6">
                                <input id="valor" type="number" step="0.01" min="0" class="form-control" name="valor" value="{{ $transacao->valor }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                            <div class="col-md-6">
                                <select id="categoria_id" class="form-control" name="categoria_id" required>

                                @foreach($categorias as $c)
                                  @if($c->id == 1 || $c->id == 2)
                                  <option value="{{ $c->id }}" <?php if($c->id == $transacao->categoria_id) echo 'selected';?> >{{ $c->nome }}</option>

                                  @endif

                                @endforeach

                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

                            <div class="col-md-6">
                                <input id="data" class="form-control" type="date" name="data" value="<?php echo date( $transacao->data );?>" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Confirmar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>















<!--
<div class="w3-col m9 w3-right">

  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
    <div class="w3-container w3-green">
      <h2>Inserção de gastos</h2>
    </div>

    <form class="w3-container">
      <div class="w3-row-padding">
        <div class="w3-third">
          <label class="w3-text-teal"><b>Valor</b></label>
          <input class="w3-input w3-border w3-light-grey" style="width:60%" type="number" step="0.01">
        </div>


        <div class="w3-third">
          <label class="w3-text-teal"><b>Categoria</b></label>
          <br>
          <select class="w3-select" name="option" style="width:60%">
            <option value="3" selected>Moradia</option>
            <option value="4">Alimentação</option>
            <option value="5">Lazer</option>
            <option value="6">Vestimenta</option>
            <option value="7">Transposte</option>
            <option value="8">Investimentos</option>
          </select>

        </div>

      </div>


      <div class="w3-row-padding mt-3">
        <div class="w3-third">
          <label class="w3-text-teal"><b>Data</b></label>
          <input class="w3-input w3-border w3-light-grey" required style="width:60%" type="date" step="0.01" value="<?php echo date("Y-m-d");?>">
        </div>


      </div>

      <div class="w3-row-padding mt-3">
          <div class="w3-third" hidden>
        <label class="w3-text-teal"><b>Descrição</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text">

      </div>

      <div class="w3-row-padding mt-3">
          <div class="w3-third">
          <button class="w3-btn w3-blue-grey  mt-3">Register</button>
      </div>
    </form>
  </div>
  <br>
  <br>
</div>
   End Middle Column -->



@endsection
