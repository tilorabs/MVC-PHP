<?php
    header("Content-Type: text/html; charset=utf-8");
    header("Expires: Mon, 10 May 2021 05:00:00 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="<?= $this->pageData['lang'] ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/favicon-16x16.png" sizes="16x16">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <title><?= $this->pageData['_title'] ?></title>
</head>

<body>
<noscript>You need to enable JavaScript to run this app.</noscript>
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fa fa-th"></i><span><?= $this->pageData['_title'] ?></span></h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" title="<?= $this->pageData['_user'] ?>">
                    <i class="fa fa-user-circle"></i><span><?= $this->pageData['_user'] ?></span></a>
                <ul class="collapse list-unstyled" id="userSubmenu">
                    <li><a href="<?= $this->makeUrl('user') ?>" title="<?= $this->pageData['_user'] ?>">
                    <span><?= $this->pageData['_user'] ?></span><i class="fa fa-list"></i></a></li>
                </ul>
            </li>
        </ul>
        <div id="nav-footer" data-toggle="collapse">
            <div id="copy">&copy; 2022 streckenweise.de</div>
        </div>
    </nav>

    <div id="content">
        <header>
            <div id="lang">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-globe"></i><span id="short"><?= ucfirst($this->pageData['lang']) ?></span><span id="long"><?= $this->pageData['lang']=='en'? 'English':'Deutsch'; ?></span>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="<?php echo $this->pageData['lang']=='en'?'dropdown-item active':'dropdown-item'; ?>" href="<?= $this->pageData['completelink'] ?>&lang=en">English</a>
                    <a class="<?php echo $this->pageData['lang']=='de'?'dropdown-item active':'dropdown-item'; ?>" href="<?= $this->pageData['completelink'] ?>&lang=de">Deutsch</a>
                </div>
            </div>
        </header>