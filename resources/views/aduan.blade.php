
@extends('layouts.front')
@section('content')

<body> 

    <section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
      <div class="container" style="margin-top:70px;margin-bottom:-30px;">

        <h3>KONTAK</h3>
       
      </div>
      </div>
    </section>
<!-- ======= Contact Section ======= -->
<section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">

      <div class="section-header">
          <h3>Hubungi Kami</h3>
          <p>Untuk info lebih lanjut silahkan hubungi kontak di bawah ini</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <address>Jl. Lintas Muara sabak,Kec. Mendahara Ulu, Kab. Tanjung Jbaung Timur,  36766.</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Telepon</h3>
              <p><a href="tel:+155895548855"> (0741) 60602</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">mendaharaulu@gmail.com</a></p>
            </div>
          </div>

        </div>


    <div class="container"> 

        <div class="row mt-5 mb-5"> 

            <div class="col-8 offset-2 mt-5"> 

                <div class="card"> 

                    <div class="card-header bg-info"> 

                        <h3 class="text-white">Form Pengaduan Masyarakat</h3> 

                    </div> 

                    <div class="card-body"> 

                         

                        @if(Session::has('success')) 

                        <div class="alert alert-success"> 

                            {{ Session::get('success') }} 

                            @php 

                                Session::forget('success'); 

                            @endphp 

                        </div> 

                        @endif 

                    

                        <form method="POST" action="{{ route('contact-form.store') }}"> 

                   

                            {{ csrf_field() }} 

                            <div class="row"> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <strong>Name:</strong> 

                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}"> 

                                        @if ($errors->has('name')) 

                                            <span class="text-danger">{{ $errors->first('name') }}</span> 

                                        @endif 

                                    </div> 

                                </div> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <strong>Email:</strong> 

                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"> 

                                        @if ($errors->has('email')) 

                                            <span class="text-danger">{{ $errors->first('email') }}</span> 

                                        @endif 

                                    </div> 

                                </div> 

                            </div> 

                            <div class="row"> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <strong>Phone:</strong> 

                                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}"> 

                                        @if ($errors->has('phone')) 

                                            <span class="text-danger">{{ $errors->first('phone') }}</span> 

                                        @endif 

                                    </div> 

                                </div> 

                                <div class="col-md-6"> 

                                    <div class="form-group"> 

                                        <strong>Subject:</strong> 

                                        <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}"> 

                                        @if ($errors->has('subject')) 

                                            <span class="text-danger">{{ $errors->first('subject') }}</span> 

                                        @endif 

                                    </div> 

                                </div> 

                            </div> 

                            <div class="row"> 

                                <div class="col-md-12"> 

                                    <div class="form-group"> 

                                        <strong>Message:</strong> 

                                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea> 

                                        @if ($errors->has('message')) 

                                            <span class="text-danger">{{ $errors->first('message') }}</span> 

                                        @endif 

                                    </div>   

                                </div> 

                            </div> 

                    

                            <div class="form-group text-center"> 

                                <button class="btn btn-success btn-submit">Save</button> 

                            </div> 

                        </form> 

                    </div> 

                </div> 

            </div> 

        </div> 

    </div> 
    </div>
    </section><!-- End Contact Section -->
    
</body> 

</html> 