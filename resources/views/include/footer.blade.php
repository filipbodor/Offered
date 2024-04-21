<div class="footer-custom">
    <footer class="text-lg-start text-muted farba card-shadow">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-black mb-4">O nás</h5>
                    <p class="text-black">OFFERED je vaše jediné miesto na vyhľadávanie a ponúkanie služieb. So zameraním na komunitu a kvalitu sa snažíme efektívne spájať ľudí a podniky.</p>
                    <p class="text-black">Pridajte sa k nám pri budovaní siete dôvery a profesionality.</p>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-black mb-4">Objavuj</h5>
                    <ul class="list-unstyled text-black">
                        <li><a href="http://127.0.0.1:8000" class="text-reset bezpodciar">Domov</a></li>
                        <li><a href="http://127.0.0.1:8000/advertisements/create" class="text-reset bezpodciar">Servis</a></li>
                        <li><a href="#!" class="text-reset bezpodciar">Kontakt</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-black mb-4">Servis</h5>
                    <ul class="list-unstyled text-black">
                        <li><a href="#!" class="text-reset">Craftsmanship</a></li>
                        <li><a href="#!" class="text-reset">Beauty & Care</a></li>
                        <li><a href="#!" class="text-reset">IT & Digital</a></li>
                        <li><a href="#!" class="text-reset">Education & Tutoring</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-black mb-4">Kontakt & Sleduj na</h5>
                    <ul class="list-unstyled text-black">
                        <li><i class="fas fa-map-marker-alt me-2"></i>Plzenska 1, Moj hud S3 VOLE</li>
                        <li><i class="fas fa-envelope me-2 font-weight-bold"></i><a href="mailto:contact@offered.com" class="text-reset bezpodciar">fabikfilipspse@gmail.com </a></li>
                        <li><i class="fas fa-phone me-2"></i>+421 944 192 111</li>
                        <li class="odkazy">
                            <a href="https://www.facebook.com/filip.bodor.3" class="text-black me-4">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/filip_bodor/" class="text-black me-4">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://twitter.com/yourpage" class="text-black me-4">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/yourpage" class="text-black me-4">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="mailto:yourgmail@gmail.com" class="text-black me-4">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </li>
                    </ul>
                </div>




                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="time-weather-wrapper color-black text-center">
                            <p id="current-time">Aktualný čas: <span class="time">Loading...</span></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="text-center p-3 farba2 text-black">
            &copy; 2024 Copyright: <a href="http://127.0.0.1:8000" class="text-black bezpodciar"> <strong>Offered.sk</strong> </a>
        </div>
    </footer>
</div>










<script>
    // Function to update the time every second
    function updateTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        // Format the time as HH:MM:SS
        var timeStr = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        document.querySelector('.time').textContent = timeStr;
    }
    setInterval(updateTime, 1000); // Update the time every second

</script>
