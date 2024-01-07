@extends('layouts/silab')
@section('search')
    <form class="app-search d-none d-md-block" action="{{ route('index') }}" method="get">
        @csrf
        <div class="position-relative d-flex">
            <input type="text" method="GET" name="cari" class="form-control" placeholder="Search..." autocomplete="off"
                id="search-options">
            <button type="submit" class="btn btn-primary ms-3 ">Cari</button>
            <span class="mdi mdi-magnify search-widget-icon"></span>
            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                id="search-close-options"></span>
        </div>
    </form>
@endsection
@section('responsive-search')
    <form class="p-3">
        @csrf
        <div class="form-group m-0">
            <div class="input-group">
                <input type="search" action="{{ route('index') }}" name="cari" class="form-control"
                    placeholder="Search ..." aria-label="Recipient's username" value="{{ old('cari') }}">
                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
            </div>
        </div>
    </form>
@endsection
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link href="{{ asset('css/company.css') }}" rel="stylesheet" type="text/css" />
{{-- hero section --}}
<section class="hero" id="home">
    <main class="heroContent">
        <h1 class="main">Lorem, ipsum dolor sit amet</h1>
        <p class="mainP">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id, et veniam? Quia impedit ab sit
            nesciunt! Natus,
            doloribus id. Suscipit, quae doloremque voluptates asperiores incidunt optio, numquam pariatur iure dicta,
            harum enim quaerat aliquam beatae!</p>
        <a href="/lab" class="heroBtn">Pesan Sekarang</a>
    </main>
</section>
{{-- end --}}

<div class="container">
    {{-- isi --}}
    <section id="about">
        <div class="content">
            <div class="dimensiKiri">
            </div>
            <div class="dimensiKanan" data-aos="fade-left" data-aos-duration="1000">
                <h2 class="sub" data-aos="fade-left" data-aos-duration="1000">Tentang Silab</h2>
                <ul data-aos="fade-left" data-aos-duration="1000">
                    <li>
                        <p class="sub2">Apa Itu Silab</p>
                    </li>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos necessitatibus numquam
                        suscipit.
                        Dolore
                        enim architecto porro deleniti libero. Eos possimus distinctio architecto id, neque ad, dolorum
                        maxime
                        ullam
                        dicta quis modi delectus aspernatur exercitationem ea, deleniti et. Rem, veritatis quasi.</p>
                    <li>
                        <p class="sub2">Visi & Misi</p>
                    </li>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos necessitatibus numquam
                        suscipit.
                        Dolore
                        enim architecto porro deleniti libero. Eos possimus distinctio architecto id, neque ad, dolorum
                        maxime
                        ullam
                        dicta quis modi delectus aspernatur exercitationem ea, deleniti et. Rem, veritatis quasi.</p>
                </ul>
            </div>
        </div>
        <div class="subContent">
            <h2>Mengapa Harus Silab?</h2>
            <div class="iconBox">
                <ul>
                    <li data-aos="fade-left" data-aos-duration="1000">
                        <div class="icon">
                            <i class="ri-checkbox-circle-fill"></i>
                        </div>
                        <div class="description">
                            <h4>Pilihan Terbaik</h4>
                            <p>Silab menawarkan beragam pilihan layanan lab yang sesuai dengan kebutuhan klien, mulai
                                dari
                                analisis kimia, mikrobiologi, hingga Fisika.Kami juga memberikan fleksibilitas dalam
                                pemilihan metode analisis yang dapat disesuaikan dengan kebutuhan klien.</p>
                        </div>
                    </li>
                    <li data-aos="fade-left" data-aos-duration="1000">
                        <div class="icon">
                            <i class="ri-hand-heart-line"></i>
                        </div>
                        <div class="description">
                            <h4>Layanan Sepenuh Hati</h4>
                            <p>Tim profesional kami selalu memberikan pelayanan yang ramah, responsif, dan berkomitmen
                                untuk
                                memberikan solusi terbaik bagi setiap kebutuhan analisis sample yang di pilih klien.
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, asperiores?
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-left" data-aos-duration="1000">
                        <div class="icon">
                            <i class=" ri-flask-line"></i>
                        </div>
                        <div class="description">
                            <h4>Kualitas Lab Terbaik</h4>
                            <p>Silab memiliki laboratorium yang dilengkapi dengan peralatan canggih dan terkini, serta
                                tim
                                ahli yang berpengalaman dalam melakukan analisis sample. Kami selalu memastikan bahwa
                                setiap
                                proses analisis dilakukan dengan standar kualitas tertinggi.</p>
                        </div>
                    </li>
                    <li data-aos="fade-right" data-aos-duration="1000">
                        <div class="icon">
                            <i class="ri-currency-line"></i>
                        </div>
                        <div class="description">
                            <h4>Harga Lebih Terjangkau</h4>
                            <p>Meskipun menawarkan layanan berkualitas tinggi, Silab juga menawarkan harga yang
                                kompetitif
                                dan terjangkau. Kami memahami pentingnya efisiensi biaya bagi klien, sehingga kami
                                selalu
                                berusaha memberikan nilai terbaik untuk setiap layanan yang kami tawarkan.</p>
                        </div>
                    </li>
                    <li data-aos="fade-right" data-aos-duration="1000">
                        <div class="icon">
                            <i class="ri-shield-keyhole-line"></i>
                        </div>
                        <div class="description">
                            <h4>Analisis Sample Secara Akurat</h4>
                            <p>Proses analisis sample yang dilakukan oleh Silab dilakukan secara teliti dan akurat,
                                menggunakan metode analisis yang teruji dan terpercaya. Kami memastikan bahwa setiap
                                hasil
                                analisis memberikan informasi yang akurat dan dapat diandalkan.</p>
                        </div>
                    </li>
                    <li data-aos="fade-right" data-aos-duration="1000">
                        <div class="icon">
                            <i class="ri-file-paper-2-line"></i>
                        </div>
                        <div class="description">
                            <h4>Bersertifikat AOM</h4>
                            <p>Silab telah memperoleh sertifikasi dari lembaga otoritas terkait, seperti sertifikasi ISO
                                atau sertifikasi AOM, yang menunjukkan komitmen kami dalam menjaga standar kualitas dan
                                keamanan dalam setiap layanan yang kami berikan.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    {{-- end --}}

    {{-- galer --}}
    <section id="galleryProduct">
        <h2 class="titleGallery">Galeri <span>Produk</span></h2>
        <div class="gallery">
            <img src="{{ asset('img/company/bg2.jpg') }}" alt="foto1" class="contentGallery" data-aos="zoom-in-up"
                data-aos-duration="1000">
            <img src="{{ asset('img/company/bg3.jpg') }}" alt="foto2" class="contentGallery" data-aos="zoom-in-up"
                data-aos-duration="1000">
            <img src="{{ asset('img/company/bg4.jpg') }}" alt="foto3" class="contentGallery"
                data-aos="zoom-in-up" data-aos-duration="1000">
            <img src="{{ asset('img/company/bg5.jpg') }}" alt="foto4" class="contentGallery"
                data-aos="zoom-in-up" data-aos-duration="1000">
            <img src="{{ asset('img/company/bg6.jpg') }}" alt="foto5" class="contentGallery"
                data-aos="zoom-in-up" data-aos-duration="1000">
            <img src="{{ asset('img/company/bg8.jpg') }}" alt="foto7" class="contentGallery"
                data-aos="zoom-in-up" data-aos-duration="1000">
            <img src="{{ asset('img/company/bg7.jpg') }}" alt="foto6" class="contentGallery"
                data-aos="zoom-in-up" data-aos-duration="1000">
            <img src="{{ asset('img/company/bg9.jpg') }}" alt="foto8" class="contentGallery"
                data-aos="zoom-in-up" data-aos-duration="1000">
        </div>
    </section>
    {{-- end --}}
</div>

{{-- contact --}}
<section id="contact">
    {{-- <h2>Contact Us</h2> --}}
    <footer>
        <div class="contentWrap">
            <div class="title">
                <i class="ri-flask-fill" id="logo"></i>
                <h3 class="pt-2">Silab</h3>
            </div>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt nam, aperiam eaque odio illo
                excepturi
                asperiores quos, vel
            </p>
        </div>
        <div class="contentWrap">
            <h5>Office</h5>
            <p>Jl.tol no 100 <br> rt003/rw004 <br> Boulevard City, Riyadh <br> Saudi Arabia</p>
            <p class="email">silab@gmail.com</p>
            <p>+62 8155 9990 6669</p>
        </div>
        <div class="contentWrap">
            <h5>Links</h5>
            <a href="#home" class="link">Home</a>
            <a href="#about" class="link">About</a>
            <a href="#product" class="link">Product</a>
            <a href="#contact" class="link">Contact</a>
        </div>
        <div class="contentWrap">
            <h5>Temukan Kami Di</h5>
            <div class="sosmedWrap">
                <a href="#" class="sosmed"><i class="ri-facebook-fill"></i></a>
                <a href="#" class="sosmed"><i class="ri-instagram-fill"></i></a>
                <a href="#" class="sosmed"><i class="ri-twitter-fill"></i></a>
                <a href="#" class="sosmed"><i class="ri-telegram-fill"></i></a>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <p>Copyright &copy 2024 Tefa Polije </p>
    </div>
</section>
{{-- end --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.js"></script>
<script>
    let typingEffect = new Typed('.sub', {
        strings: ['Tentang Silab', 'Tentang Silab...'],
        loop: true,
        typeSpeed: 100,
        backSpeed: 80,
        bakcDelay: 1500,
    })
</script> --}}
