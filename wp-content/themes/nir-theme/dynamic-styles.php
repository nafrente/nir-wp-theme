<!-- Responsive Meta tag -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Dynamic Custom Style -->
<style>
    /*Logo and text colors*/
    header a, header a span{
        color: <?php echo $_SESSION["logo_color"]; ?> !important;
    }
    body header .container nav #menu-main li a{
        color: <?php echo $_SESSION["logo_color"]; ?> !important;
    }
    body header .container nav #menu-main li.current-menu-item {
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
    @media screen and (max-width: 660px) {
        header a, header a span{
            color: #ffffff !important;
        }
        body header .container nav #menu-main li a{
            color: #ffffff !important;
        }
    }
</style>