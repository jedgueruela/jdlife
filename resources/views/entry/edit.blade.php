@extends('master')

@section('content')
    <script>
        var FORM_URL = '{{ route("entries.update", [$entry->id]) }}';
        var METHOD = 'PUT';
        var MODE = 'EDIT';
        var MODEL_DEFAULTS = {
            drawings_or_paye: '{{ $entry->drawings_or_paye }}',
            is_more_than_three_years: '{{ $entry->is_more_than_three_years }}',
            years_in_business: '{{ $entry->years_in_business }}',
            work_type: '{{ $entry->work_type }}',
            number_of_staff: '{{ $entry->number_of_staff }}',
            on_tools: '{{ $entry->on_tools }}',
            other_not_on_tools: '{{ $entry->other_not_on_tools }}',
            income: '{{ $entry->income }}',
            payment_frequency: '{{ $entry->payment_frequency }}',
            acc_cover_plan: '{{ $entry->acc_cover_plan }}',
            cover_plus_extra_cover_amount: '{{ $entry->cover_plus_extra_cover_amount }}'
        };
    </script>
    <div id="app">
        <entry-form></entry-form>
    </div>
@endsection