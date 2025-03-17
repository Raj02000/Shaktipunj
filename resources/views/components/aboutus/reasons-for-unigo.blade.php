@props(['data'])
<style>
    .fa-ul li i {
        color: rgba(191, 30, 46, 0.84);
    }

    .reason-title {
        font-size: 32px;
        font-weight: 700;
    }

    @media only screen and (max-width: 576px) {
        .reason-title {
            font-size: 15px;
            font-weight: 700;
        }
    }
</style>
<div class="text-center reason-title mb-4">{{$data->value}}</div>


<div class="d-flex justify-content-center">
    <div class="col-xl-10">
        <div>{{$data->extra['descriptions']}}
        </div>
        <ul class="fa-ul">
            @forelse ($data->extra['sections'] as $item)
                <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>
                    <span>{{$item['id']}}</span>
                    @if ($item['detail']!="null")
                        <br><br>
                        {{$item['detail']}}
                    @endif
                </li>
            @empty
                
            @endforelse
            {{-- <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>Standardized
                Testing Tutorials
            </li>
            <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>Genuine guidance
                courses and
                career</li>
            <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>Smart
                assistance with
                application for possible scholarships and assistantships</li>
            <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>Essay/SoP/Research
                Proposal
                Strategies</li>
            <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>Best support in
                Letter of
                Recommendation (LoR) and Statement of Purpose (SoP)
            </li>
            <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>Assistance with
                the visa
                application</li>
            <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>Mock-interview
                especially to
                F-1 applicants</li>
            <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>
                <p>Pre-departure briefings</p>
                Post-visa guidance helps students prepare for departure on time while Pre- departure counseling
                ensures that the students have a profound understanding of the school and the environment, the
                community and culture they will be in, and other important things needed before taking the flight.
            </li>
            <li class="my-4"><span class="fa-li"><i class="fa-solid fa-graduation-cap"></i></span>
                <p>Accommodation Arrangement
                </p>
                One of our greatest strengths is accurate and up-to-date information on colleges and universities
                and their admission requirements such as the GPA and tests like TOEFL, SAT, ACT, GRE and GMAT. In
                addition, our dedicated and experienced team members make the whole process easier and time saving.
                Our goal is to provide best service to our clients and so far we have been doing amazing.
            </li> --}}
        </ul>

    </div>
</div>
