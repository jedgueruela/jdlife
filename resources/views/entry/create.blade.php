@extends('master')

@section('content')
    <script>
        var FORM_URL = '{{ route("entries.store") }}';
        var METHOD = 'POST';
        var MODEL_DEFAULTS = {
            drawings_or_paye: '',
            is_more_than_three_years: '',
            years_in_business: '',
            work_type: '',
            number_of_staff: '',
            on_tools: '',
            other_not_on_tools: '',
            income: '',
            payment_frequency: '',
            acc_cover_plan: '',
            cover_plus_extra_cover_amount: ''
        };
    </script>
    <div id="app">
        <entry-form></entry-form>
    </div>
@endsection