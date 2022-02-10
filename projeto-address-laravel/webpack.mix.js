const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .css("resources/css/styles.css", "public/css/styles.css")
    .sass(
        "node_modules/bootstrap/scss/bootstrap.scss",
        "public/css/bootstrap.css"
    )
    .sass("node_modules/font-awesome/scss/font-awesome.scss", "public/css/font-awesome.css")
    .scripts("node_modules/jquery/dist/jquery.js", "public/js/jquery.js")
    .scripts(
        "node_modules/bootstrap/dist/js/bootstrap.bundle.js",
        "public/js/bootstrap.js"
    )
    .scripts("node_modules/jquery-mask-plugin/dist/jquery.mask.js", "public/js/jquery.mask.js")
    .scripts("node_modules/datatables.net/js/jquery.dataTables.js", "public/js/jquery.dataTables.js")
    .scripts("node_modules/datatables.net-dt/css/jquery.dataTables.css", "public/css/jquery.dataTables.css")
    .scripts("node_modules/sweetalert2/dist/sweetalert2.js", "public/js/sweetalert2.js")
    .scripts("node_modules/sweetalert2/dist/sweetalert2.css", "public/css/sweetalert2.css")
