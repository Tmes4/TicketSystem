@extends('layouts.app')

@section('content')
<div class="page d-flex">
    <div class="sidebar bg-white py-4 px-3">
        <h3 class="position-relative text-center">Event-Hub</h3>
        <ul class="p-0">
            <li>
                <a class="active d-flex align-items-center fs-6 p-2 text-decoration-none" href="#">
                    <i class="fa-regular fa-chart-bar fa-fw"></i>
                    <span class="hide-mobile">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="d-flex align-items-center fs-6 p-2 text-decoration-none" href="#">
                    <i class="fa-solid fa-gear fa-fw"></i>
                    <span class="hide-mobile">Setting</span>
                </a>
            </li>
            <li>
                <a class="d-flex align-items-center fs-6 rad-6 p-2 text-decoration-none" href="#">
                    <i class="fa-regular fa-user fa-fw"></i>
                    <span class="hide-mobile">Profiel</span>
                </a>
            </li>
            <li>
                <a class="d-flex align-items-center fs-6 rad-6 p-2 text-decoration-none" href="#">
                    <i class="fa-regular fa-diagram-project fa-fw"></i>
                    <span class="hide-mobile">Projects</span>
                </a>
            </li>
            <li>
                <a class="d-flex align-items-center fs-6 rad-6 p-2 text-decoration-none" href="#">
                    <i class="fa-regular fa-user fa-fw"></i>
                    <span class="hide-mobile">Courses</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="content D">
        <div class="head bg-white py-1 px-2 d-flex justify-content-between align-items-center">
            <div class="search position-relative">
                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                <input class="p-1" type="search" placeholder="Type A Keyword">
            </div>
            <div class="icons d-flex align-items-center">
                <span class="notification position-relative">
                    <i class="fa-regular fa-bell fa-lg"></i>
                    <img src="{{ $imageUrls->first() }}" class="img-fluid rounded-circle" alt="">
                </span>
            </div>
        </div>
        <h1 class="position-relative">Dashboard</h1>
        <div class="row row-cols-1 row-cols-md-3 g-3 mx-3">
            <div class="col">
                <div class="card">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Welcome</h5>
                        <p class="small"><!-- userName -->Last Name</p>
                        <div class="row text-center">
                            <div class="col">FULL NAME <span class="d-block">Admin</span></div>
                            <div class="col">Events <span class="d-block">100</span></div>

                            <div class="col">FULL NAME <span class="d-block">Admin</span></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
