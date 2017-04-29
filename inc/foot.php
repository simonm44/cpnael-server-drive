<footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="https://www.webmaker.fr/fr/">
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="https://www.webmaker.fr/forums/forum/webengine/">
                                Forum
                            </a>
                        </li>
                        <li>
                            <a href="https://engine.webmaker.fr/">
                                Engine
                            </a>
                        </li>
                        <li>
                            <a href="https://www.webmaker.fr/fr/contactez-nous/">
                               Contactez Nous
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2017 <a href="https://www.webmaker.fr/">WebMakerFr</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
    <script src="https://drive.webmaker.fr/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="https://drive.webmaker.fr/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="https://drive.webmaker.fr/assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="https://drive.webmaker.fr/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="https://drive.webmaker.fr/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="https://drive.webmaker.fr/assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="https://drive.webmaker.fr/assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();
            function notifications(text, type, time, icon) {
                $.notify({
            	    icon: icon,
            	    message: text

                },{
                    type: type,
                    timer: time
                });
            }
            <?php if (isset($newnotification)) { echo $newnotification; } ?>
    	});

		    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

	    $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {
            console.log(numFiles);
            console.log(label);
        });
    });
	</script>
   
    

</html>