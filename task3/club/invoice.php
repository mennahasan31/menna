<?php 
if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Method Not Allowed ";die;
}

$clubs = [
    'football' => 0,
    'swimming' => 0,
    'volleyball' => 0,
    'others' => 0,
];

define('CLUB_SUBSCRIPTION',10000);
define('MEMBER_SUBSCRIPTION',2500);

function getGamePrice(string $name) :float{
    $games = [
        'football'=>300,'swimming'=>250,'volleyball'=>150,'others'=>100
    ];
    return $games[$name] ?? 0;
}


function addMoneyToClubs(string $name) {
    global $clubs;
    $clubs[$name] += getGamePrice($name);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Invoice</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <table class="table">
        <thead>
            <tr>
                <th colspan="3">Subscriber</th>
                <th colspan="3"><?= $_POST['client_name'] ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $totalGames = 0;
            
            foreach($_POST['members'] AS $index => $member){ ?>
                <tr>
                    <td><?= $member['name'] ?></td>
                    <?php 
                    $subTotal = 0;
                    if(isset($member['games'])){
                        $countOfGamesForEachMember = count($member['games']); //3
                        foreach($member['games'] AS $game){
                            echo "<td>{$game}</td>";
                            $subTotal+= getGamePrice($game);
                            addMoneyToClubs($game);
                        }
                        for($counter = 1; $counter <= 4-$countOfGamesForEachMember;$counter++){
                            echo "<td></td>";
                        }
                    }else{
                        echo "<td colspan=4></td>";
                    } 
                    $totalGames += $subTotal;
                    ?>
                    <td class="text-right"><?= $subTotal ?></td>
                </tr>
            <?php }
            
            $totalPrice = $totalGames + (MEMBER_SUBSCRIPTION * count($_POST['members'])) + CLUB_SUBSCRIPTION;
             ?>

            <tr>
                <td colspan="3">Total Games</td>
                <td class="text-right" colspan="3"><?= $totalGames ?> EGP</td>
            </tr>
            <tr>
                <td colspan="3">Football Club</td>
                <td class="text-right" colspan="3"><?= $clubs['football'] ?> EGP</td>
            </tr>
            <tr>
                <td colspan="3">Swimming Club</td>
                <td class="text-right" colspan="3"><?= $clubs['swimming'] ?> EGP</td>
            </tr>
            <tr>
                <td colspan="3">Volleyball Club</td>
                <td class="text-right" colspan="3"><?= $clubs['volleyball'] ?> EGP</td>
            </tr>
            <tr>
                <td colspan="3">Other Club</td>
                <td class="text-right" colspan="3"><?= $clubs['others'] ?> EGP</td>
            </tr>
            <tr>
                <td colspan="3" class="text-primary">Total Price</td>
                <td class="text-right text-primary" colspan="3"><?=  $totalPrice ?> EGP</td>
            </tr>
        </tbody>
      </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>