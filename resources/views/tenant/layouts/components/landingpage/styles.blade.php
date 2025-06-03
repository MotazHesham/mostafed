
        <!-- Bootstrap Css -->
        <link id="style" href="{{global_asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Node Waves Css -->
        <link href="{{global_asset('assets/libs/node-waves/waves.min.css')}}" rel="stylesheet">

        <!-- SwiperJS Css -->
        <link rel="stylesheet" href="{{global_asset('assets/libs/swiper/swiper-bundle.min.css')}}">

        <!-- Color Picker Css -->
        <link rel="stylesheet" href="{{global_asset('assets/libs/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" href="{{global_asset('assets/libs/@simonwep/pickr/themes/nano.min.css')}}">

        <!-- Choices Css -->
        <link rel="stylesheet" href="{{global_asset('assets/libs/choices.js/public/assets/styles/choices.min.css')}}">

        <script>
                if (localStorage.zenodarktheme) {
                document.querySelector("html").setAttribute("data-theme-mode", "dark")
                }
                if (localStorage.zenortl) {
                document.querySelector("html").setAttribute("dir", "rtl")
                document.querySelector("#style")?.setAttribute("href", "{{global_asset('assets/libs/bootstrap/css/bootstrap.rtl.min.css')}}");
                }
        </script>
