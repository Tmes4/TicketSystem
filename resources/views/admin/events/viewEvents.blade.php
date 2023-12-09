@extends('layouts.app')
@section('content')
<div class="wrapper">
    <aside id="sidebar">
        <div class="h-100">
            <div class="sidebar-logo">
                <a href="#">Event-Hub</a>
            </div>
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Tools & Components
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-list pe-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                        <i class="fa-regular fa-file-lines pe-2"></i>
                        Events
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.viewEvents') }}" class="sidebar-link">Aankomende Events</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Afgelopen Events</a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a href="#" class="sidebar-link"></a>
                        </li> -->
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="fa-solid fa-sliders pe-2"></i>
                        Users
                    </a>
                    <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Admins</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Gebruikers</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-header">
                    Multi Level Nav
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="fa-solid fa-share-nodes pe-2"></i>
                        Multi Level
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="fa-regular fa-user pe-2"></i>
                        Auth
                    </a>
                    <!-- place hier include for login -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>
    <!-- Main Component -->
    <div class="main">
        <nav class="navbar navbar-expand px-3 border-bottom">
            <!-- Button for sidebar toggle -->
            <button class="btn" type="button" data-bs-theme="">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div class="container py-5">
            <a href="{{ route('create.event') }}" class="btn btn-success mb-3 py-2 px-5">TOEVOEGEN</a>
            <div class="row">
                @foreach($events as $event)
                <div class="card mb-3 px-0">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <!-- <img src="/{{ $event->imageUrl }}" class="" alt="..."> -->
                            <img class="custom-img-class" src="{{ asset($event->imageUrl) }}" alt="" width="400" height="300">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                                <p class="card-text">{{ $event->location }}</p>
                                <p class="card-text"><small class="text-body-secondary">{{ $event->description }}</small></p>
                                <p class="card-text"><small class="text-body-secondary">{{ $event->time }}</small></p>
                                <p class="card-text"><small class="text-body-secondary">{{ $event->date }}</small></p>
                                <!-- <p class="card-text"><small class="text-body-secondary">{{ $event->location }}</small></p> -->
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('edit.event', $event) }}" class="btn btn-primary">Bewerken</a>
                                    <form action="{{ route('delete.event', $event) }}" method="POST">
                                        <button type="submit" class="form-control btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                </div>
                                <!-- <a href="#" class="btn btn-danger">Verwijderen</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection