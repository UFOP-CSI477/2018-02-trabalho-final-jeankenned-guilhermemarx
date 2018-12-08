<!DOCTYPE html>
<html>
<head>
  <title>@yield('titulo')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-green.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <a href="/" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>MyGrana</a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><i class="fa fa-globe"></i></a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
      <div class="w3-dropdown-hover w3-hide-small">
        <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <a href="#" class="w3-bar-item w3-button">Logout</a>
        </div>
      </div>
      <div class="w3-dropdown-hover w3-hide-small w3-right">

        <button class="w3-button w3-padding-large" title="Notifications"><img src="/w3images/avatar2.png" class="w3-circle" style="height:23px;width:23px" alt="Foto"></button>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <Button class="w3-button" type="submit" name="logout" value="logout" >Logout</Button>
            </form>
        </div>
      </div>
      <!--<a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
        <img src="/w3images/avatar2.png" class="w3-circle" style="height:23px;width:23px" alt="Foto">
      </a>-->
    </div>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
  </div>

  <!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <!-- Profile -->
        <div class="w3-card w3-round w3-white">
          <div class="w3-container">
            <h4 class="w3-center">@yield('userName')</h4>
            <p class="w3-center"><img src="/w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Foto"></p>
            <hr>
            <p><i class="fa fa-plus fa-fw w3-margin-right w3-text-theme"></i> <strong class="w3-text-theme">@yield('Rendas')</strong></p>
            <p><i class="fa fa-minus fa-fw w3-margin-right w3-text-red"></i> <strong class="w3-text-red"> @yield('Gastos') </strong></p>
            <p><i class="fa @yield('LiquidoIcone') fa-fw w3-margin-right @yield('LiquidoCorIcone')"></i> <strong class="@yield('LiquidoCorValor')"> @yield('LiquidoValor') </strong></p>
          </div>
        </div>
        <br>

        <!-- Accordion -->
        <div class="w3-card w3-round">
          <div class="w3-white">
            <button onclick="adicionarTransacao('adicionarGasto','adicionarRenda')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i>Adicionar Transação</button>
            <div id="adicionarGasto" class="w3-hide w3-container">
              <p><a class="w3-text-black" href="{{ route('transacao.create', 'gasto' ) }}">Adicionar Gasto</a></p>
            </div>
            <div id="adicionarRenda" class="w3-hide w3-container">
              <p><a class="w3-text-black" href="{{ route('transacao.create', 'renda') }}">Adicionar Renda</a></p>
            </div>
            <form action="{{ route('transacao.index') }}">
              <button name="listar" class="w3-button w3-block w3-theme-l1 w3-left-align" type="submit" value"Listar Gastos">
                <i class="fa fa-list-ul fa-fw w3-margin-right"></i>Listar Gastos e Rendas</button>
            </form>
                  <button class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-list-ul fa-fw w3-margin-right"></i><a href=""> My Events</a></button>

            <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
            <div id="Demo4" class="w3-hide w3-container">
              <div class="w3-row-padding">
                <br>
                <div class="w3-half">
                  <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
                <div class="w3-half">
                  <img src="/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>


        <!-- End Left Column -->
      </div>

      <!-- Middle Column -->
      @yield('content')


      <!-- End Grid -->
    </div>

    <!-- End Page Container -->
  </div>
  <br>

  <!-- Footer -->
  <footer class="w3-container w3-theme-d3 w3-padding-16">
    <h5>Footer</h5>
  </footer>

  <footer class="w3-container w3-theme-d5">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <script>
  // Accordion
  function adicionarTransacao(id1,id2) {
    var x = document.getElementById(id1);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
      x.previousElementSibling.className += " w3-theme-d1";
    } else {
      x.className = x.className.replace("w3-show", "");
      x.previousElementSibling.className =
      x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
    x = document.getElementById(id2);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
      //x.previousElementSibling.className += " w3-theme-d1";
    } else {
      x.className = x.className.replace("w3-show", "");
      //x.previousElementSibling.className = x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
  }

  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace(" w3-show", "");
    }
  }




</script>
</body>
</html>