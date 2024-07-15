@extends('Plantilla.Menu')
@section('content')
<!-- about us -->
<section class="about" id="about">
    <div class="row">

        <div class="image">
            <img src="img/imagen1.jpg" alt="">
        </div>

        <div class="content">
            <h1 class="headin">Llamanos o escribenos</h1>
            <h3 class="title">"¡Estamos aqui para ayudarte!</h3>
            <p>¿Tienes dudas sobre nuestros cursos?</p>
            <p>Puedes escribirnos en cualquiera de nuestras redes sociales o escribenos un mensaje en whatsapp para mas información.</p>
        </div>

        <br>
    </div>
</section>
<!-- fin about us -->

<!-- la barra de iconos -->
<section class="iconos" id="iconos">

<div class="wrapper">
        <ul>
            <li class="facebook"><a href="https://www.facebook.com/share/GpkVrf46YhikgngS/?mibextid=qi2Omg"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li class="instagram"><a href="https://www.instagram.com/makeup_miranda.y?igsh=MWx5eDNyNmhqaWE5aQ=="><i class="fa-brands fa-instagram"></i></a></li>
            <li class="tiktok"><a href="https://www.tiktok.com/@makeup.miranda7?_r=1&_d=ee66i80k2i3d56&sec_uid=MS4wLjABAAAA-kBz2iLLtEqMP12whmOdDAYVGv5bLGdrpvsmw-mlEaFGRNOMnLaX_Eskrug1IcNU&share_author_id=6617086061377241093&sharer_language=es&source=h5_m&u_code=cl9j7j7jh49783&timestamp=1718513538&user_id=6518019970578781199&sec_user_id=MS4wLjABAAAAnihvV3jaW4fBh5jS2wc1chALMbw5lBp4i9uD6In5bBx4JZEBIicpUPcHXYsq0fP2&utm_source=copy&utm_campaign=client_share&utm_medium=android&share_iid=7378389674571597574&share_link_id=46b57591-2a8e-4031-b53c-13a1470d2119&share_app_id=1233&ugbiz_name=ACCOUNT&ug_btm=b6880%2Cb5836&social_share_type=5&enable_checksum=1"><i class="fa-brands fa-tiktok"></i></a></li>
            <li class="youtube"><a href="https://www.youtube.com/@makeupmiranda9570"><i class="fa-brands fa-youtube"></i></a></li>
            <li class="whatsapp"><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>
        
        </div>
</section>
<!-- fin de la barra de iconos -->

<!-- la barra de mensaje -->
<section class="mensaje" id="mensaje">

    <div class="content">
        <h3>Quieres aprender<br>este arte?</h3>
        <h1>Conoce la Academia</h1>

    </div>
</section>
<!-- fin de la barra de mensaje -->
<!-- la barra de google maps -->
<section class="maps" id="maps">
    <div class="content" style="max-width: 100%; overflow: hidden;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1129.2910761520336!2d-63.19971301844163!3d-17.81671715235046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e97ffbd42d2d%3A0xeea6f6a9fbc18167!2sOdontolog%C3%ADa%20Cl%C3%ADnica%20Integral!5e0!3m2!1ses-419!2sbo!4v1718514750687!5m2!1ses-419!2sbo" 
        width="600" height="450"  style="border:0; width: 100%; height: 100vh;"
        allowfullscreen="" loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"></iframe>
          
    </div>
</section>
<!-- fin de la barra de google maps -->

@endsection