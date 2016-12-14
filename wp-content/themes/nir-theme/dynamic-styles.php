<!-- Responsive Meta tag -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Dynamic Custom Style -->
<style>
    /*Logo and text colors*/
    header a, header a span, body header .container nav #menu-main li a, body header .container nav #menu-main li.current-menu-item{
        color: <?php echo $_SESSION["logo_color"]; ?> !important;
        border-color: <?php echo $_SESSION["logo_color"]; ?> !important;
    }
    body header .container nav .branding svg{
        fill: <?php echo $_SESSION["logo_color"]; ?> !important;
    }
    body a{
        color: <?php echo $_SESSION["link_color"]; ?> !important;
    }
    header.customize{
        background-image:url('<?php echo $_SESSION["header_bg"]; ?>');
    }
</style>