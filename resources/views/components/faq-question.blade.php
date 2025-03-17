@props(['number', 'question', 'answer', 'show' => false])

<!-- QUESTION #1 -->
<div class="card">

    <!-- Question -->
    <div class="card-header" role="tab" id="headingOne">
        <h5 class="h5-sm darkblue-color">
            <a data-toggle="collapse" href="#collapse-{{ $number }}" role="button" aria-expanded="true"
                aria-controls="collapse-{{ $number }}">
                <span>{{ $number }}.</span> {{ $question }}
            </a>
        </h5>
    </div>

    <!-- Answer -->
    <div id="collapse-{{ $number }}" class="collapse {{ $show ? 'show ' : '' }}" role="tabpanel"
        aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">

            <p>{{ $answer }}</p>

        </div>
    </div>


</div> <!-- END QUESTION #1 -->
