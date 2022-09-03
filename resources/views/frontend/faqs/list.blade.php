<x-backend.layout.master>
    <x-slot:title>
        Faqs
        </x-slot:title>
        <x-slot:pagetitle>
            Faqs
            </x-slot:pagetitle>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Faqs List
                    <x-backend.utilities.link-create href="{{ route('faqs.create') }}" text="Add faq" />
                </div>
                <div class="card-body">
                    <!-- //message  -->
                    <x-backend.alerts.message id="faqId" type="success" :message="session('message')" />

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>

                                <th class="col-md-.5">SL#</th>
                                <th class="col-md-2">Question</th>
                                <th class="col-md-7">Answer</th>
                                <th class="col-md-2">Action</th>
                                
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->answer }}</td>

                                    <td style="text-align:center; padding-left:0; padding-right:0;">
                                        <x-backend.utilities.link-edit
                                            href="{{ route('faqs.edit', ['faq' => $faq->id]) }}"
                                            text="Edit" />
                                        <x-backend.forms.delete
                                            action="{{ route('faqs.destroy', ['faq' => $faq->id]) }}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $faqs->links() }}
                </div>
            </div>

            @push('css')
                <style>
                    /* body{
                                background-color: blue;
                            } */
                </style>
            @endpush
            @push('js')
                <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
                <script src="{{ asset('ui/backend/js/datatables-simple-demo.js') }}"></script>
            @endpush
</x-backend.layout.master>
