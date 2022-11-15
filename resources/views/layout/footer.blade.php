</main>
<a href="{{ \App\Models\WebsiteSetting::where('name', '=', 'Local Whatsapp Link')->first()->content }}" class="float" target="_blank" title="For any technical issues contact admin @">
    <i class="fa-brands fa-whatsapp my-float"></i>
</a>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom bg_gray">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="{{ \App\Models\WebsiteSetting::where('name', '=', 'Facebook Link')->first()->content }}" class="me-4 text-reset" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="{{ \App\Models\WebsiteSetting::where('name', '=', 'Instagram Link')->first()->content }}" class="me-4 text-reset" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4 heading-red">
                        <i class="fas fa-gem me-3"></i>Select Proposal
                    </h6>
                    <p>
                        {{ \App\Models\WebsiteSetting::where('name', '=', 'Footer Moto')->first()->content }}
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 heading-red">
                        Useful links
                    </h6>
                    <p>
                        <a href="{{ route('user.home') }}" class="text-reset">Home</a>
                    </p>
                    <p>
                        <a href="{{ route('user.about-us') }}" class="text-reset">About</a>
                    </p>
                    <p>
                        <a href="{{ route('user.services') }}" class="text-reset">Services</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Contact Us</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4 heading-red">Contact</h6>
                    <p><i class="fas fa-home me-3"></i>
                        {{ \App\Models\WebsiteSetting::where('name', '=', 'Location')->first()->content }}
                    </p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        {{ \App\Models\WebsiteSetting::where('name', '=', 'Contact Email')->first()->content }}
                    </p>
                    <p><i class="fas fa-phone me-3"></i>
                        <a class="text-muted" href="tel:{{ \App\Models\WebsiteSetting::where('name', '=', 'Local Contact Number')->first()->content }}">{{ \App\Models\WebsiteSetting::where('name', '=', 'Local Contact Number')->first()->content }}</a>
                    </p>
                    <p><i class="fas fa-phone me-3"></i>
                        <a class="text-muted" href="tel:{{ \App\Models\WebsiteSetting::where('name', '=', 'Abroad Contact Number')->first()->content }}">{{ \App\Models\WebsiteSetting::where('name', '=', 'Abroad Contact Number')->first()->content }}</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4 heading-red">
                        DISCLAIMER
                    </h6>
                    <p>
                        {!! \App\Models\WebsiteSetting::where('name', '=', 'Disclimer')->first()->content !!}
                    </p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: black;color: white">
        © 2022 Copyright:
        <a class="fw-bold text-reset text-white" href="https://www.linkedin.com/in/syed-asad-ul-zaman-a73546120/"
            target="__blank"><i class="fab fa-wolf-pack-battalion"></i> Syed Asad</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<!-- Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <form method="POST" action="{{route('user-login')}}">
                    @csrf
                    <div class="text-center mb-4">
                        <h3 class="heading-black">Sign In</h3>
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="email" id="form2Example1" class="form-control" />
                        <label class="form-label" name="email" for="form2Example1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Simple link -->
                            <a class="heading-red" href="javascript:void(0)">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn login_btn btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a class="heading-red" href="{{ route('user.signup') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login -->

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="{{ asset('js/iziToast.js') }}"></script>
@include('vendor.lara-izitoast.toast')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front/js/slick.js') }}"></script>
<script src="{{ asset('front/js/slick.min.js') }}"></script>
@stack('footer')
</body>

</html>