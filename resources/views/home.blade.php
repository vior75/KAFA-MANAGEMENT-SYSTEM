@extends('layout')

@section('content')
<div class="container mt-5">
    <!-- Hero Section -->
    <div class="jumbotron text-center bg-primary text-white">
        <h1 class="display-4">Welcome to Our Bulletin Board</h1>
        <p class="lead">Stay updated with the latest announcements and posts.</p>
       
    </div>

    <!-- Feature Highlights -->
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-bullhorn fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Latest Announcements</h5>
                    <p class="card-text">Stay informed with the latest updates and announcements from our team.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-calendar-alt fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Event Schedules</h5>
                    <p class="card-text">Keep track of upcoming events and important dates on our calendar.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="fas fa-comments fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Community Discussions</h5>
                    <p class="card-text">Engage in discussions and share your thoughts with the community.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="bg-secondary text-white text-center py-5">
        <h2 class="mb-4">Join Our Community</h2>
        <p class="lead mb-4">Become a part of our growing community and stay connected.</p>
        <a class="btn btn-primary btn-lg" href="{{ url('/register') }}" role="button">Sign Up Now</a>
    </div>
</div>
@endsection
