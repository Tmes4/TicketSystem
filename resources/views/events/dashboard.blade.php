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
        <div class="head bg-white p-1 d-flex justify-content-between align-items-center">
            <div class="search position-relative">
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
    </div>
</div>
@endsection