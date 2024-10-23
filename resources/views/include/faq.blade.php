
@if(count($faqs) > 0)
<div class="faqcontainer box-class col-12 col-md-12 col-lg-12">
    <h3 class="font-fam-bold book-h3 mb-3">{{isset($title) ? $title: ''}} FAQ's</h3>

    <!-- Accordion component -->
    <div class="accordion" id="faqAccordion">
        @foreach($faqs as $index=>$faq)
        <div class="accordion-item">
            <h4 class="accordion-header" id="heading{{$index}}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{$index}}" aria-expanded="true" aria-controls="collapse{{$index}}">
                    <i class="fa-brands fa-quora"></i> <span>.</span>&nbsp; {{$faq->faqQuestion}} </button>
            </h4>
            <div id="collapse{{$index}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$index}}"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body font-fam-medium">
                    {!! $faq->faqAnswer !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endif