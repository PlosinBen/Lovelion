@extends('basic')

@section('Content')
    <section class="container" id="ledger-record">
        <form action="">
            <div class="card">
                <div class="card-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>名稱</label>
                                <input type="text" class="form-control" name="ledgerRecord[name]" autocomplete="off"
                                v-model="ledgerRecord.name">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
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
                <div class="card-header border-top">
                    消費明細
                </div>
                <div class="card-body">
                    <h5 class="h5">
                        <strong>商品</strong>
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

                    <h5 class="h5 mt-4">
                        <strong>其他</strong>
                    </h5>
                    <hr>
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
                        <div class="col-12 text-center d-sm-none pb-2">
                            名稱
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

@section('Script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.1/vue.global.prod.js"></script>
    <script>
        let ledgerRecord = {!! $ledgerRecord->toJson() !!}

            let
        config = {
            data() {
                return {
                    ledgerRecord: ledgerRecord
                }
            },
            methods: {
                calcSubtotal(i) {
                    let row = ledgerRecord.ledger_record_detail[i]
                    return parseFloat(row.unit) * parseInt(row.quantity) + parseFloat(row.other)
                },
            },
            beforeUpdate() {
                let total = 0
                ledgerRecord.ledger_record_detail.forEach((row, i) => {
                    row.subtotal = this.calcSubtotal(i)
                    total += row.subtotal
                }, this)

                ledgerRecord.ledger_record_attach.forEach((row, i) => {
                    total += parseFloat(row.amount)
                })

                this.ledgerRecord.total = total
            }
        }

        Vue.createApp(config).mount('#ledger-record')
    </script>
@endsection
