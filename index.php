<html>
<head>
  <meta charset="utf-8">
  <title>HS/NCM - Consulta de tabela</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
          <a class="navbar-brand" href="https://japao.maehara.com.br/">Japão</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item active"><a class="nav-link" href="https://japao.maehara.com.br/noticias/">Notícias</a></li>
                  <li class="nav-item"><a class="nav-link" href="https://japao.maehara.com.br/pesquisas/">Pesquisas</a></li>
                  <li class="nav-item"><a class="nav-link" href="https://japao.maehara.com.br/guias/">Guias</a></li>
                  <li class="nav-item"><a class="nav-link" href="https://japao.maehara.com.br/sobre/">Sobre</a></li>
              </ul>
          </div>
      </div>
  </nav>

  <!-- Page Content-->
  <div class="container">
    <h2 align="center">Consulta de HS/NCM</h2>
    <div class="form-group">
      <div class="input-group">
        <input type="text" name="search_text" id="search_text" placeholder="Digite código NCM/HS ou palavra chave" class="form-control" />
      </div>
    </div>
    <div id="result" class="result"></div>
  </div>

  <!-- Footer-->
  <footer class="py-5 bg-light">
    <div class="container">
      <span class="text-muted text-center">
        <p>Dados obtidos do <a href="http://comexstat.mdic.gov.br/pt/home" target="_blank">Comex Stat</a> do Ministério da Economia do Brasil.
        <br/>Não nos responsabilizamos pela atualidade dos dados apresentados. Utilize por conta e risco.</p>
        <p>Entenda como funciona a <a href="https://receita.economia.gov.br/orientacao/aduaneira/classificacao-fiscal-de-mercadorias/ncm" target="_blank">Nomenclatura Comum do Mercosul</a> ou o
        <a href="http://www.wcoomd.org/en/topics/nomenclature/overview/what-is-the-harmonized-system.aspx" target+"_blank"><i>Harmonized System</i></a>.</p>
      </span>
    </div>
  </footer>
</body>
</html>

<script>
  $(document).ready(function(){
   // fetch data from table without reload/refresh page
   load_data();
   function load_data(query){
      $.ajax({
       url:"geths.php",
       method:"POST",
       data:{query:query},
       success:function(data){
         $('#result').html(data);
       }
      });
   }
   // live search data from table without reload/refresh page
   $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != ''){
     load_data(search);
    } else {
     load_data();
    }
   });
  });
</script>
