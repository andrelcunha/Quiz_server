        <!-- JavaScripts necessários para alguns controles do Bootstrap, além de interações JQuery -->
        <script src="js/vendor/jquery-3.3.1.min.js"></script>
        <script src="js/vendor/popper.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>

        <?php
        if (count($jspersons) > 0)
        {
            foreach ($jspersons as $js)
            {
                echo("<script src=\"js/$js\"></script>\n");
            }
        }
        ?>
    </body>
</html>