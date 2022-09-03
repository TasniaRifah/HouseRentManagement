{{-- @dd($faqs); --}}

<x-frontend.layout.master>
    <div class="accordion" id="accordionExample">
        @foreach ($faqs as $faq)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target={{ '#collapseOne'.$faq->id }}  
                            aria-expanded="true" aria-controls="collapseOne">
                            {{ $faq->question}}
                        </button>
                    </h2>
                </div>

                <div id={{ 'collapseOne'.$faq->id }}  class="collapse " aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        {{ $faq->answer}}
                    </div>
                </div>
            </div>
        @endforeach

    </div>


</x-frontend.layout.master>
