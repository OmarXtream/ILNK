<div style="display:flex;justify-content:center">
{!! DNS2D::getBarcodeSVG($link, 'QRCODE',20,20) !!}
</div>

<footer style="display:flex;justify-content:center;margin-top:90px">
    <a href="https://HWE.sa" target="_blank"><img width="60px" height="30px" src="{{ asset('assets/imgs/logo/HWE-dark.png') }}" alt="HWE"></a>
</footer> 

<script>
    setTimeout(function() {
        window.print();
    }, 1000);
</script>
