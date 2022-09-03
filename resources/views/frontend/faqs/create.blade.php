<x-backend.layout.master>
    <x-slot:title>
        Create Faqs
    </x-slot:title>

    <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Faq Create 
                    <x-backend.utilities.link-index href="{{route('faqs.index')}}" text="Faqs List "/>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <x-backend.alerts.errors />
                    @endif

                                <form action="{{ route('faqs.store') }}" method="post" enctype="multipart/form-data">
                                  
                                  @csrf
                                    <x-backend.forms.input name="question" type="text" :value="old('question')" />
                                    <br>
                                    <x-backend.forms.textarea name="answer" :value="old('answer')"/>
                                           
                                    <x-backend.forms.submit />
                                   
                                </form>
                </div>
    </div>

</x-backend.layout.master>
