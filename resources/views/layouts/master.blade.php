<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <style>
      .img-container {
        text-align: center;
      }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" method="GET" action="/paket">
      <div class="input-group input-group-sm">
        <input name="cari" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Wilayah Timur Info</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
                {{Auth::user()->name}}
                <p>{{Auth::user()->type}}</p>
          </a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt blue"></i>
              <p>
              Dashboard
              </p>
            </a>
          </li>
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building green"></i>
              <p>
                Wilayah
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/balai/1/wil_profile" class="nav-link">
                        <i class="fas fa-map nav-icon purple"></i>
                        <p>Wilayah Barat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/balai/2/wil_profile" class="nav-link">
                        <i class="fas fa-building nav-icon purple"></i>
                        <p>Wilayah Timur</p>
                        </a>
                    </li>
                </ul>
            </li>
          </li> --}}
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-building green"></i>
                  <p>
                    Balai
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>                
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="/wilayah" class="nav-link">
                            <i class="fas fa-map nav-icon purple"></i>
                            <p>Wilayah</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="/balai" class="nav-link">
                            <i class="fas fa-building nav-icon purple"></i>
                            <p>Balai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/satker" class="nav-link">
                            <i class="fas fa-users nav-icon teal"></i>
                            <p>Satker</p>
                            </a>
                        </li>
                    </ul>
                </li>
              </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks orange"></i>
              <p>
                e-Programming
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-building nav-icon orange"></i>
                  <p>Stock</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-list-alt purple"></i>
                  <p>Baseline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar green"></i>
              <p>
                Progres
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/paketbalai" class="nav-link">
                  <i class="fas fa-building nav-icon yellow"></i>
                  <p>Balai</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/paket" class="nav-link">
                  <i class="nav-icon fas fa-list-alt red"></i>
                  <p>Paket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/paketaccess" class="nav-link">
                  <i class="nav-icon fas fa-list-alt blue"></i>
                  <p>Paket Access</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-list-alt blue"></i>
                  <p>Progres Keuangan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database orange"></i>
              <p>
                Database
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-building nav-icon yellow"></i>
                  <p>Balai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-circle-notch red"></i>
                  <p>Air Tanah</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fa fa-building nav-tint blue"></i>
                  <p>Air Baku
                  <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-building nav-icon blue"></i>
                      <p>Air Permukaan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-water nav-icon orange"></i>
                      <p>Air Tanah</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-circle nav-icon green"></i>
                      <p>Mata Air</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-home nav-icon red"></i>
                      <p>PAH</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe-asia cyan"></i>
              <p>
                Wilayah
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/provinsi" class="nav-link">
                  <i class="fas fa-map nav-icon yellow"></i>
                  <p>Provinsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kabupaten" class="nav-link">
                  <i class="fas fa-map-marked nav-icon purple"></i>
                  <p>Kabupaten</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kecamatan" class="nav-link">
                  <i class="fas fa-map-marker nav-icon blue"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/desa" class="nav-link">
                  <i class="fas fa-map-marker-alt nav-icon green"></i>
                  <p>Desa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/balai" class="nav-link">
                  <i class="nav-icon fas fa-building blue"></i>
                  <p>Balai</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-grip-lines-vertical blue"></i>
              <p>
                Wilayah Sungai
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ws" class="nav-link">
                  <i class="fas fa-bacon nav-icon green"></i>
                  <p>WS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/das" class="nav-link">
                  <i class="fas fa-map-marked nav-icon purple"></i>
                  <p>DAS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/cat" class="nav-link">
                  <i class="fas fa-trash-restore-alt nav-icon red"></i>
                  <p>CAT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/balai" class="nav-link">
                  <i class="nav-icon fas fa-building blue"></i>
                  <p>Balai</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog green"></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/users" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/developer" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                  Developer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              <i class="nav-icon fas fa-user orange"></i>
              <p>
              Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="nav-icon fa fa-power-off red"></i>
                  <p>
                    {{ __('Logout') }}
                  </p>
                </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">


        @yield('content')


      </div>
    </div>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>

<script src="/js/app.js"></script>
</body>
</html>
