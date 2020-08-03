<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('template/head'); ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div id="loader" style="display: none"></div>
        <div class="wrapper">
            <header class="main-header">
                <?php $this->load->view('template/navbar'); ?>
            </header>
            <aside class="main-sidebar">
                <?php $this->load->view('template/sidebar'); ?>
            </aside>
            <div class="content-wrapper">
                <?php $this->load->view('template/content-body'); ?>
            </div>
            <?php $this->load->view('template/footer'); ?>
        </div>
        <?php $this->load->view('template/script'); ?>
    </body>
</html>
