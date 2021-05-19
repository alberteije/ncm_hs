<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once "connect.php";

  $output = "";
  mysqli_set_charset($con, 'utf8');

  if(isset($_POST["query"])){
    $search = mysqli_real_escape_string($con, $_POST["query"]);
    $query = "
      SELECT CO_NCM, CO_SH6, NO_NCM_POR, NO_SH6_POR, NO_SH4_POR, NO_SH2_POR, NO_SEC_POR FROM tabelacheia
      WHERE MATCH(CO_NCM, CO_SH6, CO_SH4, CO_SH2, NO_NCM_POR, NO_NCM_ING, NO_SH6_POR, NO_SH6_ING, NO_SH4_POR, NO_SH4_ING, NO_SH2_POR, NO_SH2_ING, NO_SEC_POR, NO_SEC_ING)
      AGAINST('".$search."' IN NATURAL LANGUAGE MODE)
     ";
    // $query = "
    //   SELECT CO_NCM, CO_SH6, NO_NCM_POR, NO_SH6_POR, NO_SH4_POR, NO_SH2_POR, NO_SEC_POR FROM tabelacheia
    //   WHERE MATCH(CO_NCM, CO_SH6, CO_SH4, CO_SH2, NO_NCM_POR, NO_SH6_POR, NO_SH4_POR, NO_SH2_POR, NO_SEC_POR)
    //   AGAINST('".$search."' IN NATURAL LANGUAGE MODE)
    // ";
    // $query = "
    //   SELECT CO_NCM, CO_SH6, NO_NCM_POR, NO_SH6_POR, NO_SH4_POR, NO_SH2_POR, NO_SEC_POR FROM tabelacheia
    //   WHERE CO_NCM LIKE '%".$search."%'
    //   OR CO_SH6 LIKE '%".$search."%'
    //   OR NO_NCM_POR LIKE '%".$search."%'
    //   OR NO_SH6_POR LIKE '%".$search."%'
    //   OR NO_SH4_POR LIKE '%".$search."%'
    //   OR NO_SH2_POR LIKE '%".$search."%'
    //   OR NO_SEC_POR LIKE '%".$search."%'
    //  ";
  } else {
   $query = "SELECT CO_NCM, CO_SH6, NO_NCM_POR, NO_SH6_POR, NO_SH4_POR, NO_SH2_POR, NO_SEC_POR FROM tabelacheia WHERE CO_NCM = 0";
  }
  $result = mysqli_query($con, $query);

  if(mysqli_num_rows($result) > 0){
     $output .= '
      <div class="table-responsive">
       <table class="table table bordered">
       <thead>
        <tr>
        <th><div data-toggle="tooltip" data-html="true" title="<b>Código NCM</b><br/>6 Regras Gerais para Interpretação do Sistema Harmonizado e 2 Regras Gerais Complementares.">CO_NCM</div></th>
        <th><div data-toggle="tooltip" data-html="true" title="<b>Código SH6</b><br/>Descrição">CO_SH6</div></th>
        <th><div data-toggle="tooltip" data-html="true" title="<b>Nome NCM</b><br/>Descrição NCM do produto. (8 dígitos)">NO_NCM_POR</div></th>
        <th><div data-toggle="tooltip" data-html="true" title="<b>Nome SH6</b><br/>Nome da Subposição (6 primeiros dígitos)">NO_SH6_POR</div></th>
        <th><div data-toggle="tooltip" data-html="true" title="<b>Nome SH4</b><br/>Nome da posição (4 primeiros dígitos)">NO_SH4_POR</div></th>
        <th><div data-toggle="tooltip" data-html="true" title="<b>Nome SH2</b><br/>Nome do capítulo (2 primeiros dígitos)">NO_SH2_POR</div></th>
        <th><div data-toggle="tooltip" data-html="true" title="<b>Nome Seção</b><br/>">NO_SEC_POR</div></th>
        </tr>
       </thead>
       <tbody>
     ';
     // while ($row = mysqli_fetch_array($result)){
     while ($row = mysqli_fetch_assoc($result)){
      $output .= '
       <tr>
        <td>'.$row["CO_NCM"].'</td>
        <td>'.$row["CO_SH6"].'</td>
        <td>'.$row["NO_NCM_POR"].'</td>
        <td>'.$row["NO_SH6_POR"].'</td>
        <td>'.$row["NO_SH4_POR"].'</td>
        <td>'.$row["NO_SH2_POR"].'</td>
        <td>'.$row["NO_SEC_POR"].'</td>
       </tr>
      ';
     }
     $output .="</tbody></table>";
     echo $output;
  } else {
    echo 'Favor realizar busca. Resultado: 0';
  }
?>
</body>
</html>
