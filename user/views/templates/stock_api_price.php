
<!DOCTYPE html>
<html>

<body>


    <?php


        $API_KEY = "LBI8NKNNNBU35N9H";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol='.$_SESSION['company_code'].'&apikey='. $API_KEY));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        $result = json_decode($server_output,true);
        $d1 = $result['Time Series (Daily)'];
        $dates = array('2019-11-13','2019-11-12','2019-11-11','2019-11-08','2019-11-07','2019-11-06','2019-11-05','2019-11-04','2019-11-01');



     ?>
    <main>
        <div class="container" style="width:120%">
                <div class="card" style="margin-top: 5vh;">
                  <div class="card-header" style="color: #fac239;font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    font-weight: bold; width: 100%; padding:2px; background-color: #34495E  ; font-size: 1.2rem; ">
                    Stock Details
                  </div>
                  <div class="card-body">
                    <p style="font-size: 1.3rem; font-weight: bold;"><?php echo $view_company_detail[1] ?></p>
                    <small>NASDAQ: <?php echo $view_company_detail[11] ?></small>
                    <br>
                    <br>
                    <table class="table table-striped table">
                      <thead class="table-dark">

                        <tr>
                          <th scope="col">Date</th>
                          <th scope="col">Open Price</th>
                          <th scope="col">High Price</th>
                          <th scope="col">Low Price</th>
                          <th scope="col">Close Price</th>
                          <th scope="col">Volume</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php for ($x = 0; $x <= 8; $x++) {
                            $d2 = $d1[$dates[$x]] ;
                                echo "<tr>"."
                                  <th scope='row'>".$dates[$x]."</th>
                                  <td>". $d2['1. open']."</td>
                                  <td>". $d2['2. high']."</td>
                                  <td>". $d2['3. low']."</td>
                                  <td>". $d2['4. close']."</td>
                                  <td>". $d2['5. volume']."</td>
                                </tr>";
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
    </main>





  <script>

  </script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type="text/javascript" src="./main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
