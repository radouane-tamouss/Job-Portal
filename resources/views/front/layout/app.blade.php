<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <meta name="description" content="@yield('seo_meta_description')" />
        <title>@yield('seo_title')</title>
        <link rel="icon" type="image/png" href="{{asset('uploads/favicon.png')}}" />

        @include('front.layout.styles')

        @include('front.layout.scripts')
        <link
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text">111-222-3333</li>
                            <li class="email-text">contact@arefindev.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            @if(Auth::guard('company')->check())
                              <li class="menu">
                                <a href="{{route('company_dashboard')}}"><i class="fas fa-user-circle"></i> Profil</a>
                              </li>
                              <li class="menu active">
                                <a href="{{route('company_dashboard')}}"><i class="fas fa-chart-line"></i> Tableau de bord</a>
                              </li>
                              <li class="menu">
                                <a href="{{route('company_logout')}}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                              </li>
                            @elseif(Auth::guard('candidate')->check())
                              <li class="menu">
                                <a href="{{route('candidate_dashboard')}}"><i class="fas fa-user-circle"></i> Profil</a>
                              </li>
                              <li class="menu active">
                                <a href="{{route('candidate_dashboard')}}"><i class="fas fa-chart-line"></i> Tableau de bord</a>
                              </li>
                              <li class="menu">
                                <a href="{{route('candidate_logout')}}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                              </li>
                            @else 
                            <li class="menu">
                                <a href="{{route('login')}}"
                                    ><i class="fas fa-sign-in-alt"></i> Connexion</a
                                >
                            </li>
                            <li class="menu">
                                <a href="{{route('signup')}}"
                                    ><i class="fas fa-user"></i>S'inscrire</a
                                >
                            </li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        @include('front.layout.nav')

        @yield('main_content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Pour les candidats</h2>
                            <ul class="useful-links">
                                <li><a href="">Parcourir les offres d'emploi</a></li>
                                <li><a href="">Parcourir les candidats</a></li>
                                <li><a href="">Tableau de bord du candidat</a></li>
                                <li><a href="">Emplois enregistrés</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Pour les entreprises</h2>
                            <ul class="useful-links">
                                <li><a href="">Publier une offre d'emploi</a></li>
                                <li><a href="">Parcourir les offres d'emploi</a></li>
                                <li><a href="">Tableau de bord de l'entreprise</a></li>
                                <li><a href="">Candidatures</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Contact</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    34 lot deroua, casablanca, Morocco
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="right">contact@az-networking.com</div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="right">122-222-1212</div>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href=""
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-pinterest-p"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-linkedin-in"></i
                                    ></a>
                                </li>
                                <li>
                                    <a href=""
                                        ><i class="fab fa-instagram"></i
                                    ></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2 class="heading">Newsletter</h2>
                            <p>Pour recevoir les dernières nouvelles de notre site, veuillez vous abonner ici :</p>
                            {{-- <form action="{{ route('subscriber_send_email') }}" method="post" class="form_subscribe_ajax"> --}}
                            <form action="{{route('subscriber_send_email')}}"  method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control">
                                    <span class="text-danger error-text email_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="S'abonner maintenant">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright">
                            Droits d'auteur 2022, Az-Networking. Tous droits réservés.
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="right">
                            <ul>
                                <li><a href="{{route('terms')}}">Conditions d'utilisation</a></li>
                                <li>
                                    <a href="privacy.html">Politique de confidentialité</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        @include('front.layout.scripts_bottom')

        @if($errors->any())
            @foreach($errors->all() as $error)
                <script>
                    iziToast.error({
                        title: '',
                        position: 'bottomRight',
                        message: '{{ $error }}',
                    });
                </script>
            @endforeach
        @endif

        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'bottomRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'bottomRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif

        {{-- <script>
            (function($){
                $(".form_subscribe_ajax").on('submit', function(e){
                    e.preventDefault();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            if(data.code == 0)
                            {
                                $.each(data.error_message, function(prefix, val) {
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if(data.code == 2)
                            {
                                $.each(data.error_message_2, function(prefix, val) {
                                    $('.email_error').text(data.error_message_2);
                                });
                            }
                            else if(data.code == 1)
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                             }
            
                        }
                    });
                });
            })(jQuery);
            </script> --}}

    </body>
</html>
 