<!doctype html>
<html lang="en">

<head>
    <title>sign up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>

    <div class="container">
        <form action="10doSignUp.php" method="post">
            <h1 class="text-center">sign up</h1>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">信箱</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" >
                </div>
            </div>
            <div class="row mb-3">

                <label for="name" class="col-sm-2 col-form-label">姓名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
            </div>
            <div class="row mb-3">

                <label for="password" class="col-sm-2 col-form-label">密碼</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" ><i class="bi bi-eye-slash" ></i>
                </div>
            </div>
            <div class="row mb-3">

                <label for="repassword" class="col-sm-2 col-form-label">再次輸入密碼</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="repassword" name="repassword" >
                </div>
            </div>

            <button class="btn btn-info" type="submit">送出</button>
        </form>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>