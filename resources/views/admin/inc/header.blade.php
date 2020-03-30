<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>

    <nav class="navbar  navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">

        <a class="navbar-brand" href="#">Dashboard</a>


        <div  id="navbarNav">
            <ul class="navbar-nav">

            <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.cats.index') }}">Categories</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.trainers.index') }}">Trainers</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.courses.index') }}">Courses</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.students.index') }}">Students</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">Log out</a>
            </li>

            </ul>
        </div>
      </nav>
