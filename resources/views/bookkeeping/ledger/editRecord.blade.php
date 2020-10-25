@extends('basic')

@section('Content')
    <section class="container" id="ledger-record">
        <form method="POST" action="{{ $action }}">
            @isset($method)
                <input type="hidden" name="_method" value="{{ $method }}">
            @endisset
            <div class="card mb-4">
                <div class="card-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label>日期</label>
                                <div id="datetimepicker" class="input-group">
                                    <input type="text" class="form-control bg-white" name="ledgerRecord[date]"
                                           autocomplete="off"
                                           value="{{ $ledgerRecord->date->toDateString() }}">
                                    <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>地點</label>
                                <input type="text" class="form-control" name="ledgerRecord[locate]" autocomplete="off"
                                       v-model="ledgerRecord.locate">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>備註</label>
                                <input type="text" class="form-control" name="ledgerRecord[note]" autocomplete="off"
                                       v-model="ledgerRecord.note">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="form-group">
                                <label>總金額</label>
                                <input type="number" class="form-control text-right" name="ledgerRecord[total]"
                                       readonly="readonly"
                                       v-model="ledgerRecord.total">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-top">
                    消費明細
                </div>
                <div class="card-body">
                    <h5 class="h5">
                        <strong>商品</strong>
                        <a href="#" class="small pl-2" @click.prevent="addDetail">
                            <i class="fas fa-plus"></i>
                        </a>
                    </h5>
                    <hr>
                    <div class="row border-bottom d-none d-md-flex">
                        <div class="col-4 text-center pb-2">
                            商品名稱
                        </div>
                        <div class="col-2 text-center">
                            單價
                        </div>
                        <div class="col-2 text-center">
                            數量
                        </div>
                        <div class="col-2 text-center">
                            其他加減
                        </div>
                        <div class="col-2 text-center">
                            單品小計
                        </div>
                    </div>
                    <div v-for="row, i in ledgerRecord.ledger_record_detail" :class="{ 'bg-light': i % 2 == 0 }"
                         class="row border-bottom pt-2">
                        <input type="hidden" :name="'ledgerRecordDetail[' + i + '][id]'" v-model="row.id">
                        <div class="col-12 text-center d-md-none pb-2">
                            商品名稱
                        </div>
                        <div class="col-12 text-center">
                            <button type="button" class="close text-danger" @click.prevent="delDetail(i)">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="col-12 col-md-4 pb-2">
                            <input type="text" class="form-control" autocomplete="off"
                                   :name="'ledgerRecordDetail[' + i + '][name]'" v-model="row.name">
                        </div>
                        <div class="col-4 text-center d-md-none align-self-center">
                            單價
                        </div>
                        <div class="col-8 col-md-2 pb-2">
                            <input type="number" class="form-control text-right" autocomplete="off"
                                   :name="'ledgerRecordDetail[' + i + '][unit]'" v-model="row.unit">
                        </div>
                        <div class="col-4 text-center d-md-none align-self-center">
                            數量
                        </div>
                        <div class="col-8 col-md-2 pb-2">
                            <input type="number" class="form-control text-right" autocomplete="off"
                                   :name="'ledgerRecordDetail[' + i + '][quantity]'" v-model="row.quantity">
                        </div>
                        <div class="col-4 text-center d-md-none align-self-center">
                            其他加減
                        </div>
                        <div class="col-8 col-md-2 pb-2">
                            <input type="number" class="form-control text-right" autocomplete="off"
                                   :name="'ledgerRecordDetail[' + i + '][other]'" v-model="row.other">
                        </div>
                        <div class="col-4 text-center d-md-none align-self-center">
                            單品小計
                        </div>
                        <div class="col-8 col-md-2 pb-2">
                            <input type="number" class="form-control text-right" readonly="readonly"
                                   :name="'ledgerRecordDetail[' + i + '][subtotal]'" v-model="row.subtotal">
                        </div>
                    </div>

                    <h5 class="h5 mt-4 pb-4 border-bottom">
                        <strong>其他</strong>
                        <a href="#" class="small pl-2" @click.prevent="addAttach">
                            <i class="fas fa-plus"></i>
                        </a>
                    </h5>
                    <div class="row border-bottom d-none d-sm-flex">
                        <div class="col-9 text-center pb-2">
                            名稱
                        </div>
                        <div class="col-3 text-center">
                            金額
                        </div>
                    </div>
                    <div v-for="row, i in ledgerRecord.ledger_record_attach" :class="{ 'bg-light': i % 2 == 0 }"
                         class="row border-bottom pt-2">
                        <input type="hidden" :name="'ledgerRecordAttach[' + i + '][id]'" v-model="row.id">
                        <div class="col-12 text-center d-sm-none pb-2">
                            名稱
                        </div>
                        <div class="col-12 text-center">
                            <button type="button" class="close text-danger" @click.prevent="delAttach(i)">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="col-12 col-sm-9 pb-2">
                            <input type="text" class="form-control" autocomplete="off"
                                   :name="'ledgerRecordAttach[' + i + '][name]'" v-model="row.name">
                        </div>
                        <div class="col-4 text-center d-sm-none align-self-center">
                            金額
                        </div>
                        <div class="col-8 col-sm-3 pb-2">
                            <input type="number" class="form-control text-right" autocomplete="off"
                                   :name="'ledgerRecordAttach[' + i + '][amount]'" v-model="row.amount">
                        </div>
                    </div>

                    <h5 class="h5 mt-4">
                        <strong>小計</strong>
                    </h5>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="form-group">
                                <label>總金額</label>
                                <input type="number" class="form-control text-right" v-model="ledgerRecord.total"
                                       readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary mr-2">新增</button>
                    <a type="button" class="btn btn-outline-secondary"
                       href="{{ route('bookkeeping.ledger.show', $ledgerRecord->Ledger->id) }}">取消</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('StyleSheet')
    <link rel="stylesheet" href="{{ asset('res/tempusdominus-bootstrap/tempusdominus-bootstrap-4-v5.1.2.min.css') }}">
@endsection

@section('Script')
    <script src="{{ asset('res/moment.min.js') }}"></script>
    <script src="{{ asset('res/tempusdominus-bootstrap/tempusdominus-bootstrap-4-v5.1.2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.1/vue.global.prod.js"></script>
    <script>
        let ledgerRecord = @json($ledgerRecord)

    </script>
    <script>
        $(function () {
            $('#datetimepicker').datetimepicker({
                format: 'L'
            });
        });

        let
            config = {
                data() {
                    return {
                        ledgerRecord: ledgerRecord
                    }
                },
                methods: {
                    addDetail() {
                        this.ledgerRecord.ledger_record_detail.push({})
                    },
                    delDetail(i) {
                        this.ledgerRecord.ledger_record_detail.splice(i, 1)
                    },
                    addAttach() {
                        this.ledgerRecord.ledger_record_attach.push({})
                    },
                    delAttach(i) {
                        this.ledgerRecord.ledger_record_attach.splice(i, 1)
                    }
                },
                beforeUpdate() {
                    let total = 0
                    this.ledgerRecord.ledger_record_detail.forEach((row, i) => {
                        row.quantity = parseInt(row.quantity) || 1
                        row.subtotal = (parseFloat(row.unit) || 0) * row.quantity + (parseFloat(row.other) || 0)
                        total += row.subtotal
                    }, this)

                    this.ledgerRecord.ledger_record_attach.forEach((row, i) => {
                        total += parseFloat(row.amount) || 0
                    })

                    this.ledgerRecord.total = total
                }
            }

        Vue.createApp(config).mount('#ledger-record')
    </script>
@endsection
