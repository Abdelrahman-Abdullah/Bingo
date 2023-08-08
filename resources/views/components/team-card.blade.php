@props(['teamMembers'])
<section class="team" id="team">
    <div class="container">
        <div class="row justify-content-center">
            <!-- section title -->
            <div class="col-xl-6 col-lg-8">
                <div class="title text-center ">
                    <h2>Our Team</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque quasi tempora obcaecati, quis
                        similique quos.</p>
                    <div class="border"></div>
                </div>
            </div>
            <!-- /section title -->
        </div>
        <div class="row">
            @foreach($teamMembers as $member)
                <!-- team member -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-member text-center">
                        <div class="member-photo">
                            <!-- member photo -->
                            <img loading="lazy" class="img-fluid" src="https://i.pravatar.cc/?u={{$member->id}}" alt="Meghna">
                            <!-- /member photo -->

                        </div>

                        <!-- member name & designation -->
                        <div class="member-content">
                            <h3>{{$member->name}}</h3>
                            <span>{{$member->position}}</span>
                            <p>{{$member->bio}}</p>
                        </div>
                        <!-- /member name & designation -->

                    </div>
                </div>
                <!-- end team member -->
            @endforeach
        </div> <!-- End row -->
    </div> <!-- End container -->
</section>
