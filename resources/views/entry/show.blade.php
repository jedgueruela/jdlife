@extends('master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Entry {{ $entry->id }} | 
                    <a href="{{ route('entries.edit', [$entry->id]) }}">Edit</a>
                    <form class="float-right" action="{{ route('entries.destroy', [$entry->id]) }}" onclick="return confirm('Are you sure you want to delete this entry?')" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>Drawings or PAYE:</strong> <br>
                                    {{ $entry->drawings_or_paye }}
                                </td>
                            </tr>
                                <td>
                                    <strong>More than 3 years in business:</strong> <br>
                                    {{ $entry->is_more_than_three_years }}
                                </td>
                            </tr>
                                <td>
                                    <strong>Years in business:</strong> <br>
                                    {{ $entry->years_in_business }}
                                </td>
                            </tr>
                                <td>
                                    <strong>Work type:</strong> <br>
                                    {{ $entry->work_type }}
                                </td>
                            </tr>
                                <td>
                                    <strong>Number of staff:</strong> <br>
                                    {{ $entry->number_of_staff }}
                                </td>
                            </tr>
                                <td>
                                    <strong>On tools:</strong> <br>
                                    {{ $entry->on_tools }}
                                </td>
                            </tr>
                                <td>
                                    <strong>Other shareholders/director that are not on the tools:</strong> <br>
                                    {{ $entry->other_not_on_tools }}
                                </td>
                            </tr>
                                <td>
                                    <strong>Income:</strong> <br>
                                    {{ $entry->income }}
                                </td>
                            </tr>
                                <td>
                                    <strong>Payment frequency:</strong> <br>
                                    {{ $entry->payment_frequency }}
                                </td>
                            </tr>
                                <td>
                                    <strong>ACC cover plan:</strong> <br>
                                    {{ $entry->acc_cover_plan }}
                                </td>
                            </tr>
                                <td>
                                    <strong>Cover plus extra cover amount:</strong> <br>
                                    {{ $entry->cover_plus_extra_cover_amount }}
                                </td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
