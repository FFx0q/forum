<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administrator Panel</title>

        <link rel="stylesheet" href="/admin/public/css/admin.css" />
        <link href="/admin/public/css/material-dashboard.min.css" rel="stylesheet" />
        
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    </head>
    <body class="dark-edition">
        <div class="wrapper">
            <?php require_once ("sidebar.php"); ?>
            <div class="main-panel">
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="/" class="nav-link" ><i class="material-icons">home</i></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">person</i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="/admin/edit_user.php?uid=<?= $_SESSION['admin_login'] ?>">Edit profile</a>
                                        <a class="dropdown-item" href="/admin/logout.php">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>  
                    </div>
                </nav>
                <div class="content">
                    <div class="container-fluid">