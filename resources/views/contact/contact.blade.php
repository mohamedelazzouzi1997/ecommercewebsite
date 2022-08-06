@extends('layouts.app')


@section('title')
HajarFleur
@endsection

@section('links')

@endsection

@section('style')

@endsection



@section('content')

<!--Section: Contact v.2-->
<section style="margin-top:200px; margin-bottom:125px!important" class="mb-4 container">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form id="contact-form" action="{{ route('send.msg') }}" method="POST">
                @csrf
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-4">
                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" required>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-4">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>

                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-4">
                            <input type="text" id="subject" name="phone" class="form-control" placeholder="Tel">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form mb-4">
                            <textarea type="text" id="message" name="msg" rows="2" class="form-control md-textarea" placeholder="Your message"></textarea>

                        </div>

                    </div>
                </div>
                <!--Grid row-->
                 <button type="submit" class="btn btn-primary btn-block">Send</button>
            </form>

            <div class="text-center text-md-left">

            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
@endsection

@section('scripts')

@endsection
