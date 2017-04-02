@extends('layouts.app')
@section('content')
 <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row text-center">
                @foreach($service as $s)
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">{{$s->heading}}</h4>
                    <p class="text-muted">{{$s->body}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                @foreach($portfolio as $p)
                <div class="col-md-4 col-sm-6 portfolio-item">
                  
                    <a href="#{{$p->id}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{url('public/images/portfolio/'.$p->pimage)}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>{{$p->heading}}</h4>
                        <p class="text-muted">{{$p->sub_title}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

<!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        
                             @php $counter = 1; @endphp
                            @foreach($about as $a)
                            <li class=" @if($counter % 2 == 0) timeline-inverted @endif">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="{{url('public/images/about/'.$a->about_image)}}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>{{$a->datetitle}}</h4>
                                        <h4 class="subheading">{{$a->title}}</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">{{$a->body}}</p>
                                    </div>
                                </div>
                            </li>
                            @php $counter++; @endphp
                            @endforeach
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                @foreach($team as $t)
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="{{url('public/images/team/'.$t->teamimage)}}" class="img-responsive img-circle" alt="">
                        <h4>{{$t->name}}</h4>
                        <p class="text-muted">{{$t->job}}</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="{{$t->flink}}"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="{{$t->tlink}}"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="{{$t->inlink}}"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
    <aside class="clients">
        <div class="container">
            <div class="row">
                @foreach($brand as $b)
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="{{url('public/images/brand/'.$b->brandimage)}}" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                @endforeach
                
            </div>
        </div>
    </aside>

     <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" action="contact/post" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="phone" placeholder="Your Phone *" id="phone">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" name="message" id="message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Portfolio Modal 1 -->
    @foreach($portfolio as $p)
    <div class="portfolio-modal modal fade" id="{{$p->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>{{$p->heading}}</h2>
                                <p class="item-intro text-muted">{{$p->sub_title}}</p>
                                <img class="img-responsive img-centered" 
                                     src="{{url('public/images/portfolio/'.$p->toggle_image)}}" alt="">
                                <p>{{$p->body}}</p>
                                <p>
                                    <strong>{{$p->sub_title}}</strong>{{$p->question}}</p>
                                <ul class="list-inline">
                                    <li>Date: {{date('M j, Y ',strtotime($p->created_at))}}</li>
                                    <li>Client: {{$p->client}}</li>
                                    <li>Category: {{$p->sub_title}}</li>
                                </ul>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     @endforeach

@endsection