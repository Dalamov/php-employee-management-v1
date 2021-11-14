<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />

    <title>Employee</title>
</head>

<body>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <header>
        <?php
        require_once('../assets/html/header.html');
        ?>
    </header>

        
        <main class= "container">
            <br>
            <h2>Employee Details</h2>
            <br>
            <form>
            <input type="hidden" class="form-control" name="id" id="employeeId" value="<?php echo $employee['id'] ?>">
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="inputName" class="form-label font-weight-bold">Name</label>
                <input type="text" class="form-control" name="name" id="inputName" value="<?php echo $employee['name'] ?>">
            </div>
            <div class="col-sm-4">
                <label for="inputLastName" class="form-label font-weight-bold">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="inputLastName" value="<?php echo $employee['lastName'] ?? '' ?>">
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="inputEmail" class="form-label font-weight-bold">Email address</label>
                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="user@mail.com" value="<?php echo $employee['email'] ?>">
            </div>
            <div class="col-sm-4">
                <label for="selectGender" class="form-label font-weight-bold">Gender</label>
                <select class="form-control" name="gender" id="selectGender">
                    <option value="man">Man</option>
                    <option value="woman">Woman</option>
                    <option Value="other">Other</option>
                </select>
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-4">
                    <label for="inputAge" class="form-label font-weight-bold">Age</label>
                    <input type="text" class="form-control" name="age" id="inputAge" value="<?php echo $employee['age'] ?>">
            </div>
            <div class="col-sm-4">
                <label for="inputCity" class="form-label font-weight-bold">City</label>
                <input type="text" class="form-control" name="city" id="inputCity" value="<?php echo $employee['city'] ?>">
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="inputState" class="form-label font-weight-bold">State</label>
                <br>
                <select id="selectState" class="form-select" name="state">
                    <option value="">Choose...</option>
                    <option value="CA">CA</option>
                    <option value="UA">UA</option>
                    <option value="WA">WA</option>
                    <option value="KNT">KNT</option>
                    <option value="GEO">GEO</option>
                    <option value="UT">UT</option>
                    <option value="TN">TN</option>
                    <option value="LU">LU</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="inputZip" class="form-label font-weight-bold">Zip</label>
                <input type="text" class="form-control" name="postalCode" id="inputZip" value="<?php echo $employee['postalCode'] ?>">
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="inputAddress" class="form-label font-weight-bold">Street Address</label>
                <input type="text" class="form-control" name="streetAddress" id="inputAddress" value="<?php echo $employee['streetAddress'] ?>">
            </div>
            <div class="col-sm-4">
                <label for="inputPhone" class="form-label font-weight-bold">Phone number</label>
                <input type="text" class="form-control" name="phoneNumber" id="inputPhone" value="<?php echo $employee['phoneNumber'] ?>">
            </div>
            </div><br>
            <div class="row justify-content-center">
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary" name="updateSubmit">Submit</button>
                <button type="submit" class="btn btn-secondary" name="updateSubmit">Return</button>
            </div>
            </div>
            </form>
        </main>

    <footer>
        <?php
        require_once('../assets/html/footer.html');
        ?>
    </footer>

    <!-- <script>
        let gender = "<?php echo $employee['gender'] ?>";
        $("#selectGender").val(gender);

        let state = "<?php echo $employee['state'] ?>";
        $("#selectState").val(state);

        const validation = $("#updateForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                age: {
                    required: true,
                    number: true,
                    min: 18
                },
                email: {
                    required: true,
                    email: true
                },
                phoneNumber: {
                    required: true,
                    digits: true
                },
                postalCode: {
                    required: true,
                    digits: true
                },
                city: {
                    required: true,
                    minlength: true
                },
            }
        });

        $("#updateForm").on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);

            if (!validation.errorList.length) {
                $.ajax({
                    type: "PUT",
                    url: "library/employeeController.php",
                    dataType: "json",
                    data: data,
                    cache: false,
                    success: function(data, status) {
                        console.log(data, status);
                        if (data == 'sessionTimeOut') {
                            window.location.reload();
                        }

                        $(".alert-wrapper").empty();
                        $(".alert-wrapper")
                            .append(`<div class="alert alert-success" role="alert">${data.Message}</div>`)

                        // $('#updateForm').trigger("reset");
                        window.setTimeout(function() {
                            $('.alert-success').addClass('d-none');
                        }, 3000);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr, status, error);
                        let err = JSON.parse(xhr.responseText);
                        $(".alert-wrapper").empty();
                        $(".alert-wrapper")
                            .append(`<div class="alert alert-danger" role="alert">${data.Message}</div>`)

                        window.setTimeout(function() {
                            $('.alert-danger').addClass('d-none');
                        }, 3000);
                    }
                });
            }
        });

        const userName = "<?php echo $authUser['name'] ?>";
        setUserName(userName);
    </script> -->
</body>

</html>