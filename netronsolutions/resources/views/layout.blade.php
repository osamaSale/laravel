<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' , 'Login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
</head>
<body data-bs-theme="dark">
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function Toggle() {
            let temp = document.getElementById("typepass");
            const toggle = document.querySelector(".toggle")
            if (temp.type === "password") {
                temp.type = "text";
                document.querySelector(".toggle").style.color = "blue"
                toggle.classList.replace("fa-eye-slash", "fa-eye");
            }
            else {
                temp.type = "password";
                toggle.classList.replace("fa-eye", "fa-eye-slash");
            }
        }
    </script>
</body>
</html>