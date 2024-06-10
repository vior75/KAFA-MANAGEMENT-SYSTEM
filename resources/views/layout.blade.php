<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin Board</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background-color: #995f29;
            color: white;
            padding-top: 20px;
            flex-shrink: 0;
        }
        .sidebar .text-center {
            margin-bottom: 20px;
        }
        .sidebar-menu {
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .sidebar a {
            color: black;
            text-decoration: none;
            padding: 15px;
            display: block;
            margin: 5px 0;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar a:hover {
            background-color: #ffffff;
            color: #995f29;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            position: relative;
        }
        .profile-box {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .profile-box img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
        .profile-box .user-info {
            display: flex;
            flex-direction: column;
        }
        .bulletin-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }
        .bulletin-header {
            background-color: #ffffff;
            color: black;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 10px;
        }
        .bulletin-container {
            background-color: #7DCFA7;
            padding: 20px;
            border-radius: 0 0 8px 8px;
        }
        .search-box {
            margin-bottom: 20px;
        }
        .search-box .form-control {
            border: none;
            border-radius: 0;
            border-bottom: 1px solid #ced4da;
            box-shadow: none;
            background-color: transparent;
            height: 40px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .search-box .form-control:focus {
            border-color: #b56055;
            box-shadow: none;
        }
        .search-box .btn {
            border-radius: 0;
            height: 40px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="text-center mb-4">
            <img src="http://localhost/KAFA/storage/app/public/media/Logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
        </div>
        
        <div class="sidebar-menu">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/bulletins') }}">Bulletin</a>
            <a href="#">Timetable</a>
            <a href="#">Result</a>
            <a href="#">Payment</a>
            <a href="{{ url('/logout') }}">Log out</a>
        </div>
    </div>
    <div class="content">
        <div class="profile-box">
            <img src="http://localhost/KAFA/storage/app/public/media/Logo.png" alt="Profile Picture">
            <div class="user-info">
                <strong>John Doe</strong>
                <span>Admin</span>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-12 col-md-8 col-lg-6">
                <form class="card card-sm search-box">
                    <div class="card-body row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-lg btn-success" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="bulletin-container">
            <div class="bulletin-card">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
