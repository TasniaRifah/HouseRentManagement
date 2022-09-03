<x-backend.layout.master>
    <x-slot:title>
        Edit Faqs
    </x-slot:title>

    <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Edit Faqs
                    <x-backend.utilities.link-index href="{{route('faqs.index')}}" text="Faqs List "/>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif
                                <form action="{{ route('faqs.update', ['faq' => $faq->id]) }}" method="post" enctype="multipart/form-data">
                                  
                                  @csrf
                                  @method('patch')
                                    <x-backend.forms.input name="question" type="text" :value="old('question', $faq->question)" />
                                    <x-backend.forms.textarea name="answer" :value="old('answer', $faq->answer)"/>
                                    <x-backend.forms.submit text="Update"/>
                                   
                                </form>
                </div>
    </div>

</x-backend.layout.master>
