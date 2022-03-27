<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Chipper</title>
  </head>
  <body>
  <div class="container my-4">
    <div class="row">
        <div class="col-md-4">
        <div class="card">
          <div class="card-header text-bold">Chaesar Chipper</div>
          <form action="" method="post">
              <div class="card-body">
                  <div class="form-group">
                      <label for="">Text</label>
                      <input type="text" name="text" id="" class="form-control" value="<?php echo empty($_POST['text'])?'':$_POST['text'] ?>">
                  </div>
                  <div class="form-group my-3">
                      <label for="">Kunci (Angka)</label>
                      <input type="text" name="key" id="" class="form-control" value="<?php echo empty($_POST['key'])?'':$_POST['key'] ?>">
                  </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="enkripsi">Enkripsi</button>
                  <button type="submit" class="btn btn-success" name="deskripsi">Deskripsi</button>
              </div>
          </form>
          </div>
        </div>
  
        <?php
          $alfabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','p','Q','R','S','T','U','V','W','X','Y','Z'];

        ?>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-bold">Hasil</div>

                <div class="card-body">
                  <?php
                    if(isset($_POST['enkripsi'])){
                  ?>
                  
                  <label for="">Plain</label>
                  <table class="table table-bordered" style="font-size: 10px;">
                    <tr>
                      <?php
                        foreach ($alfabet as $item) {
                      ?>
                        <td><?php echo $item ?></td>
                      <?php } ?>
                    </tr>
                  </table>


                  <?php
                    $jumlah = strlen($_POST['text']);
                    $textArr = [];
                    for($i=0; $i < $jumlah; $i++){
                      $textArr[] = substr($_POST['text'], $i, 1);
                    }
                    
                    $posisi = [];
                    $eliminasi = [];
                    $p =0 ;

                    foreach ($textArr as $textArray) {
                      foreach ($alfabet as $position) {
                        $p++;
                        if(strtolower($position) == strtolower($textArray)){ 
                          $posisi[] = $p-1;
                          $p = 0;
                        }
                        if($textArray == " "){
                          $posisi[] = " ";
                          $p = 0;
                        }
                        
                      }
                      $p = 0;
                    }

                  ?>




                  <label for="">Chipper</label>

                  <?php
                    if(!empty($_POST['text'])  && !empty($_POST['key'])){
                  ?>
                  <table class="table table-bordered" style="font-size: 10px;">
                    <tr>
                      <?php
                        $chipper = [];
                        $text = $_POST['text'];
                        $key = (int) $_POST['key'];


                        for ($i=$key; $i <=25 ; $i++) { 
                          $chipper[] = $alfabet[$i];
                        }

                        for ($i=0; $i < $key ; $i++) {
                          $chipper[] = $alfabet[$i];
                        }

                        foreach ($chipper as $chip) {
                      ?>
                          <td class="<?php foreach ($posisi as $position) {
                            if(strtolower($chip)==strtolower($chipper[$position])){ echo 'bg-success text-white text-bold'; }
                          } ?>"><?php echo $chip ?></td>
                      <?php } ?>
                    </tr>
                  </table>





                  <?php } ?>

                  

                  <table>
                    <tr>
                      <td>Plain Text</td>
                      <td>&emsp;:&emsp;</td>
                      <td class="text-bold"><?php echo strtoupper($_POST['text']) ?></td>
                    </tr>
                    <tr>
                      <td>Chipper Text</td>
                      <td>&emsp;:&emsp;</td>
                      <td class="text-bold">
                      <?php
                          foreach ($posisi as $ambil) {
                            if($ambil===" "){
                              echo " ";
                            }else{
                              echo strtoupper($chipper[$ambil]);
                            }
                          }
                        ?>
                      </td>
                    </tr>
                  </table>








                <?php }else if(isset($_POST['deskripsi'])){ ?>



                  <label for="">Plain</label>
                  <table class="table table-bordered" style="font-size: 10px;">
                    <tr>
                      <?php
                        foreach ($alfabet as $item) {
                      ?>
                        <td><?php echo $item ?></td>
                      <?php } ?>
                    </tr>
                  </table>

                  <?php
                    $jumlah = strlen($_POST['text']);
                    $textArr = [];

                    $chipper = [];
                    $text = $_POST['text'];
                    $key = (int) $_POST['key'];


                    for ($i=$key; $i <=25 ; $i++) { 
                      $chipper[] = $alfabet[$i];
                    }

                    for ($i=0; $i < $key ; $i++) {
                      $chipper[] = $alfabet[$i];
                    }

                    for($i=0; $i < $jumlah; $i++){
                      $textArr[] = substr($_POST['text'], $i, 1);
                    }

                    
                    
                    $posisi = [];
                    $eliminasi = [];
                    $p =0 ;

                    foreach ($textArr as $textArray) {
                      foreach ($chipper as $position) {
                        $p++;
                        if(strtolower($position) == strtolower($textArray)){ 
                          $posisi[] = $p-1;
                          $p = 0;
                        }
                      }
                      if($textArray == " "){
                        $posisi[] = " ";
                        $p = 0;
                      }
                      $p = 0;
                    }

                  ?>


                  <label for="">Chipper</label>

                  <?php
                    if(!empty($_POST['text'])  && !empty($_POST['key'])){
                  ?>
                  <table class="table table-bordered" style="font-size: 10px;">
                    <tr>
                      <?php
                        
                        foreach ($chipper as $chip) {
                      ?>
                          <td class="<?php foreach ($posisi as $position) {
                            if(strtolower($chip)==strtolower($chipper[$position])){ echo 'bg-success text-white text-bold'; }
                          } ?>"><?php echo $chip ?></td>
                      <?php } ?>
                    </tr>
                  </table>
                  <?php } ?>


                  <table>
                    <tr>
                      <td>Plain Text</td>
                      <td>&emsp;:&emsp;</td>
                      <td class="text-bold"><?php echo strtoupper($_POST['text']) ?></td>
                    </tr>
                    <tr>
                      <td>Chipper Text</td>
                      <td>&emsp;:&emsp;</td>
                      <td class="text-bold">
                        <?php
                          foreach ($posisi as $ambil) {
                            if($ambil===" "){
                              echo " ";
                            }else{
                              echo strtoupper($alfabet[$ambil]);
                            }
                          }
                        ?>
                      </td>
                    </tr>
                  </table>


                <?php } ?>
                </div>
            </div>
        </div>
    </div>






  </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>