<?php 
if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Method Not Allowed ";die;
}
?>
<!doctype html>
<html lang="en">
 

<head>
    <title>members</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="text-center text-warning">
                 Club
                </h1>
                <div class="col-4 offset-4 my-5">
                    <form action="invoice.php" method="post">
                        <input type="hidden" name="client_name" value="<?= $_POST['client_name'] ?>">
                        <?php for($counter = 1;$counter <= $_POST['number_of_members']; $counter++){ ?>
                            <div>
                                <div class="form-group">
                                    <h2 class="text-primary"> Member(<?= $counter ?>) </h2>
                                </div>
                                <div class="form-group">
                                    <label for="name">Member Name</label>
                                    <input type="text" name="members[<?= $counter ?>][name]" id="name" class="form-control" placeholder=""
                                        aria-describedby="helpId">
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="members[<?= $counter ?>][games][football]" value="football" class="custom-control-input"
                                            id="football<?= $counter ?>">
                                        <label class="custom-control-label" for="football<?= $counter ?>"> Football (300 EGP) </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="members[<?= $counter ?>][games][swimming]" value="swimming" class="custom-control-input"
                                            id="swimming<?= $counter ?>">
                                        <label class="custom-control-label" for="swimming<?= $counter ?>"> Swimming (250 EGP) </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="members[<?= $counter ?>][games][volleyball]" value="volleyball"
                                            class="custom-control-input" id="volleyball<?= $counter ?>">
                                        <label class="custom-control-label" for="volleyball<?= $counter ?>"> Volleyball (150 EGP)
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="members[<?= $counter ?>][games][others]" value="others" class="custom-control-input"
                                            id="others<?= $counter ?>">
                                        <label class="custom-control-label" for="others<?= $counter ?>"> Others (100 EGP) </label>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <button class="btn btn-outline-primary form-control"> Show My Invoice </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>