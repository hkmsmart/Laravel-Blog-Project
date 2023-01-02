    </div>
</div>
<!-- Footer-->
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    @php
                        $socials = ['facebook','twitter','youtube','instagram','linkedin']
                    @endphp
                    @foreach($socials as $soc)
                        @if($config->$soc != '')
                            <li class="list-inline-item">
                                <a href="{{$config->$soc}}" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-{{$soc}} fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="small text-center text-muted fst-italic">Copyright &copy; {{$config->title}} - {{date('Y-m-d')}}</div>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{asset('front/js/scripts.js')}}"></script>
</body>
</html>
