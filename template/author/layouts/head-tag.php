<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel</title>
    <link rel="shortcut icon" href="" type="image/x-icon" />

    <link rel="stylesheet" href="<?= asset('public/admin-panel/css/bootstrap.min.css') ?>" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">
    <link href="<?= asset('public/jalalidatepicker/persian-datepicker.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('public/admin-panel/css/style.css') ?>" rel="stylesheet" type="text/css">

    <!-- Quill for text area form -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- add bold quill -->
    <style>
        /* Match Quill headings with Bootstrap styles */
        .ql-editor h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .ql-editor h2 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .ql-editor h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .ql-editor h4 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .ql-editor h5 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .ql-editor h6 {
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        /* Optional spacing and base styles */
        .ql-editor p {
            margin-bottom: 1rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* List style */
        .ql-editor ol {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .ql-editor ul {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .ql-editor li {
            margin-bottom: 0.5rem;
        }

        /* Strong, italic, underline */
        .ql-editor strong,
        .ql-editor b {
            font-weight: bold !important;
        }

        .ql-editor em,
        .ql-editor i {
            font-style: italic !important;
        }

        .ql-editor u {
            text-decoration: underline !important;
        }

        /* Optional image styling */
        .ql-editor img {
            max-width: 100%;
            height: auto;
            border-radius: 0.25rem;
            margin: 1rem 0;
        }

        .truncate-cell {
            max-width: 300px;
            /* or whatever width you like */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

</head>

<body>

    <nav class="navbar  navbar-light bg-gradiant-green-blue nav-shadow">

        <a class="navbar-brand" href=""></a>
        <span class="">
            </a>
            <span class="dropdown">
                <a class="dropdown-toggle text-decoration-none text-dark" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= url('logout') ?>">Logout</a>
                </div>
            </span>
        </span>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block pt-3 bg-sidebar sidebar px-0">
                <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url('author') ?>"><i
                        class="fas fa-home"></i> Home</a>

                <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url('author/post') ?>"><i
                        class="fas fa-newspaper"></i> Post</a>

                <a class="text-decoration-none d-block py-1 px-2 mt-1" href="<?= url('author/comment') ?>"><i
                        class="fas fa-comments"></i> Comment</a>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">