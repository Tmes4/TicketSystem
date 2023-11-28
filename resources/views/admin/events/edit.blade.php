@extends('layouts.App')

@section('content')
<div class="wrapper">
    <!-- Sidebar -->
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
        <div class="container pt-5" style="width:960px ;">
            <form action="{{ route('update.event', $event) }}" method="POST" style="min-width: 320px;" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4>Nieuw Event</h4>

                <div class="form-group">
                    <label for="title">Titel</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $event->title) }}">
                </div>

                <div class="form-group">
                    <label for="location">Locatie</label>
                    <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $event->location) }}">
                </div>

                <div class="form-group">
                    <label for="time">Tijd</label>
                    <input type="time" id="time" name="time" class="form-control" value="{{ old('time', $event->time) }}">
                </div>

                <div class="form-group">
                    <label for="date">Datum</label>
                    <input type="date" id="date" name="date" class="form-control" value="{{ old('date', $event->date) }}">
                </div>

                <div class="form-group">
                    <label for="price">Prijs</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">&euro;</div>
                        </div>
                        <input type="number" min="0" id="price" name="price" class="form-control" value="{{ old('price', $event->price) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="imageUrl">Foto</label>
                    <input type="file" id="imageUrl" name="imageUrl" accept="image/png, image/jpeg, image/gif">
                </div>

                <div class="form-group">
                    <label for="description">Beschrijving</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" value>{{ old('description', $event->description) }}</textarea>
                </div>

                <button type="submit" class="form-control btn btn-primary my-2">Opslaan</button>
                
            </form>
        </div>
    </div>
</div>

@endsection