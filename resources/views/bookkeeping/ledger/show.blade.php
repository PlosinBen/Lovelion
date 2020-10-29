@extends('basic')

@section('Content')
    <section class="container">
        <div class="card">
            <div class="card-body border-bottom">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <h5 class="h4 mb-0">{{ $ledger->name }}</h5>
                    </div>
                    <div class="col-12 col-md-4 text-right mb-3">
                        <label class="small">建立時間</label>：
                        <span class="small">{{ $ledger->created_at }}</span>
                    </div>
                    <div class="col-12 col-md-4">
                        <label>幣別</label>：
                        <span>{{ $ledger->currency_code }}</span>
                    </div>
                    <div class="col-12 col-md-4">
                        <label>消費筆數</label>：
                        <span>{{ $statistics->count }}</span>
                    </div>
                    <div class="col-12 col-md-4">
                        <label>消費金額</label>：
                        <span>{{ $statistics->total }}</span>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-sm btn-success"
                           href="{{ route('bookkeeping.ledgerRecord.create', ['ledger_id' => $ledger->id]) }}">
                            新增紀錄
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <caption>
                    {{ $ledgerRecords->withQueryString()->links() }}
                </caption>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                        <tr class="text-center">
                            @if(env('APP_DEBUG'))
                                <th>id</th>
                            @endif
                            <th>日期</th>
                            <th>地點</th>
                            <th>金額</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ledgerRecords as $ledgerRecord)
                            <tr role="button" onclick="location.href='{{ route('bookkeeping.ledgerRecord.show', $ledgerRecord->id) }}'">
                                @if(env('APP_DEBUG'))
                                    <td>{{ $ledgerRecord->id }}</td>
                                @endif
                                <td>{{ $ledgerRecord->date->format('m-d') }}</td>
                                <td>{{ $ledgerRecord->locate }}</td>
                                <td class="text-right">{{ number_format($ledgerRecord->total) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <caption>
                    {{ $ledgerRecords->withQueryString()->links() }}
                </caption>
            </div>
        </div>

    </section>
@endsection

@section('AfterContent')
    <!-- Modal -->
    <div class="modal fade" id="createLedgerRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        </div>
    </div>
@endsection

@section('Script')
    <script>
        $('table').on('click', 'tr', function () {

            console.log(this.dataset.id)
        })
    </script>
@endsection
