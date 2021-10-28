@extends('Template.home_template');
@section('content')

    <!-- offer section -->


    <div class="container" style="margin-top: 9rem; margin-bottom: 5rem;">
        <section id="cart_items">
            <div class="container">

                <!--/breadcrums-->

                <div class="step-one">
                    <h2 class="heading">Step1</h2>
                </div>


                <div class="register-req">
                    <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
                </div>
                <!--/register-req-->

                <div class="shopper-informations">
                    <div class="row">
                        <div class="">

                            @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                            @endif

                            @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                <strong>Success!</strong> {{ $message }}
                            </div>
                            @endif

                            <div class="card card-default">
                                <div class="card-header">
                                    Razorpay Payment Gateway Integration

                                </div>

                                <div class="card-body text-center">
                                    @if(Session()->has('success'))

                                    <h4>Payment successful. please fillup your Address and Number </h4>
                                    @else
                                    <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                        @csrf
                                        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount=" {{session()->get('total')*100}}" data-buttontext="Pay {{session()->get('total')}} INR" data-name="ItSolutionStuff.com" data-description="Rozerpay" data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png" data-prefill.name="name" data-prefill.email="email" data-theme.color="#ff7529">
                                        </script>
                                    </form>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12 mt-3 clearfix" style="width: 100%;">
                            <div class="w-100">
                                <div class="shopper-info">
                                    <p>Shopper Information</p>
                                    <form>
                                        <input type="text" placeholder=" Name" value="name: {{$user->name}}" disabled>
                                        <input type="text" placeholder="email" value="email: {{$user->email}}" disabled>
                                        <input type="text" placeholder="number" value="number: {{$user->phone}}" disabled>

                                    </form>

                                </div>
                            </div>
                            <div class="bill-to">
                                <p>Bill To</p>
                                <div class="form-one" style="width: 100%;">



                                    <form action="{{route('placeorder')}}" method="POST">


                                        @csrf

                                        <input type="text" name="address" class="" placeholder="address">


                                        <input type="text" name="number" placeholder="number">

                                        @if(Session()->has('success'))

                                      @else
                                      <div class="form-check mt-3">
                                            <input class="form-check-input p-1" type="checkbox" name="payment" value="1" id="flexCheckDefault" required>
                                            <label class="form-check-label ms-3 fs-6 " style="color: gray;font-weight: 300;" for="flexCheckDefault">
                                                Pay On Delivary
                                            </label>
                                        </div>

                                        @endif
                                        <button class="btn btn-danger  mt-5" type="submit"><span class="ti-bag pe-3 fs-5"></span>Submit</button>


                                    </form>
                                </div>

                            </div>
                        </div>





                    </div>
                </div>



            </div>
        </section>
    </div>

    <!-- 
home section -->


    <!-- special section -->

    <!-- contact section -->
@endsection