@props(['title', 'date', 'location', 'description'])

<style>
    .event_day {
        font-size: 3.75rem;
        font-weight: 900;
    }

    .event_month {
        font-size: 1.5625rem;
        font-weight: 600;
    }

    .event_title {
        font-size: 1.875rem;
        font-weight: 600;

    }

    .event_desc {
        font-size: 0.9375rem;
        font-weight: 400;
    }


    @media screen and (max-width: 512px) {
        .event_day {
            font-size: 3rem;
            font-weight: 900;
        }

        .event_month {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .event_title {
            font-size: 1.3rem;
            font-weight: 600;

        }

        .event_desc {
            font-size: 0.8rem;
            font-weight: 400;
        }
    }
</style>

<div class="row rounded-4 my-4 mx-sm-0 mx-1 shadow-sm">


    <div class="col-md-2 col-3 p-0 rounded-start" style="background-color: #FF2323;">
        <div class="white-text text-center event_day" style="">
            {{ \Carbon\Carbon::parse($date)->day }}
        </div>
        <div class="white-text text-center event_month" style="">
            {{ \Carbon\Carbon::parse($date)->format('M') }}
        </div>
        <div class="white-text text-center event_month" style="">
            {{ \Carbon\Carbon::parse($date)->year }}
        </div>
        <div class="white-text text-center my-2">
            <i class="fa fa-calendar event_month"></i>
        </div>
    </div>
    <div class="col-md-10 col-9 white-bg align-self-center px-md-5 px-3">
        <div class="my-1 event_title" style="">{{ $title }}</div>
        <div class="my-1" style="">
            <i class="fa fa-map-marker me-1"></i>{{ $location }}
        </div>
        <div class="my-1 event_desc" style="">{!! $description !!}</div>
        <a href="{{ route('contact') }}" type="button"
            class="my-2 text-decoration-none primary-bg border-0 text-light py-1 rounded-pill px-3">Register</a>
    </div>
</div>
