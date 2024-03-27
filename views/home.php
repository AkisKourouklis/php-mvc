<?php
require_once __DIR__ . '/../model/CarModel.php';
$carmodel = new CarModel();
$cars = $carmodel->getall();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-mvc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <style>
        .header {
            background-color: #fe0000;
            text-align: center;
            padding: 10px;


        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Car Inventory</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class='d-flex justify-content-between align-items-center mb-2'>
                    <h2>Car List</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Car
                    </button>
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cars as $car) {

                        ?>
                            <tr>
                                <div class="modal fade" id="exampleModal-<?php echo $car['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this car?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger seconddelete" data-id="<?php echo $car['id']; ?>">Delete</button>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <td><?php echo isset($car['id']) ? $car['id'] : '' ?></td>
                                <td><?php echo isset($car['company']) ? $car['company'] : '' ?></td>
                                <td><?php echo isset($car['model']) ? $car['model'] : '' ?></td>
                                <td><?php echo isset($car['year']) ? $car['year'] : '' ?></td>
                                <td><?php echo isset($car['color']) ? $car['color'] : '' ?></td>
                                <td>
                                    <a href="/car/<?php echo $car['id']; ?>" class="btn btn-primary">update</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php
                                                                                                                                        echo $car['id']; ?>">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id='createform' action="api/cars-create" method='post'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a new car</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="company" class="form-label">Write the company</label>
                            <input type="text" class="form-control" id="company" name='company'>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Write the model</label>
                            <input type="text" class="form-control" id="model" name='model'>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Write the year</label>
                            <input type="text" class="form-control" id="year" name='year'>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Write the color</label>
                            <input type="text" class="form-control" id="color" name='color'>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save car</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.seconddelete').click(function() {
                const id = $(this).data('id');
                $.ajax({
                    url: 'http://localhost:8080/api/cars-delete/' + id,
                    type: 'delete',
                    success: function(response) {
                        location.reload();
                    }
                });

            });
            $('#createform').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });
    </script>



</body>

</html>