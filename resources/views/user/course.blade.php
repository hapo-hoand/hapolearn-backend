@extends('user.master')

@section('content')
    <div class="allcourse course">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-sm-8">
                    <div class="row">
                        <div class="col">
                            <div class="col-courses">
                                <div class="thumbnail lg-html">
                                    <img class="" src="{{ asset('images/html.png') }}" class="img-fluid" alt="Card image cap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="row">
                        <div class="col">
                            <div class="text-describe-course">
                                Descriptions course
                             </div>
                             <div class="content-describe-course">
                                 <p>Vivamus volutpat eros pulvinar velit laoreet, 
                                     sit amet egestas erat dignissim. Sed quis rutrum tellus, 
                                     sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. 
                                     Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. 
                                     Pellentesque tristique fringilla tempus. Vivamus
                                 </p>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
