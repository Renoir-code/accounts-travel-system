
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-3.6.1.min') ?>"></script>
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url('/') ?>">Accounts Travel Management System </a>
    </button>
    <div id="navbar">
      <ul class="nav navbar-nav navbar-right ">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/') ?>">Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/logout') ?>">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Options</a>
		      <div class="dropdown-menu">
            <a class="dropdown-item" href="" ></a>
            <a class="dropdown-item" href="">Other Options </a>
            <a class="dropdown-item" href="">Anyhthing you want </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">My Choice</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">










