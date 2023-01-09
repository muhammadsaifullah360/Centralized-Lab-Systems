<x-admin.layout.operator_dashboard>

    <main style="margin-top: 50px">
        <div class="container pt-4">
            <div class="row">
                <form method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body py-5">
                            <div class="card-header">
                                <div class="row ">
                                    <div class="justify-content-center mb-4"><h3 class="note note-success">Upload Test
                                            Report</h3></div>
                                    <div class="col-6">

                                        <div class="form-outline mb-4">
                                            <input name="report_id" type="text" class="form-control"
                                                   value="{{ $report_id }}" readonly
                                                   required/>
                                            <label class="form-label" for="form1Example1">Report ID</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input name="name" type="text" class="form-control"
                                                   value="{{ $app->test ?? '' }}"
                                                   readonly required/>
                                            <label class="form-label" for="name">Test Name</label>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input name="normal_value" value="{{ $get_detail->normal_value }}"
                                                   type="text" class="form-control"/>
                                            <label class="form-label " for="form1Example1">Normal Value</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input name="resulted_value" value="{{ $get_detail->resulted_value }}"
                                                   type="text" class="form-control"/>
                                            <label class="form-label" for="form1Example1">Resulted Value</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input name="user_id" type="text" id="numberField"
                                                   value="{{ $app->user_id ?? '' }}"
                                                   class="form-control" required/>
                                            <label class="form-label" for="form1Example1">Patient Name</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                                <textarea name="remarks" class="form-control" id="textAreaExample"
                                                          rows="3">{{ $get_detail->remarks ?? '' }}</textarea>
                                            <label class="form-label"
                                                   for="address">Remarks</label>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('appointment') }}" type="button" class="btn btn-danger">
                                            Cancel</a>
                                        <button formaction="{{route('upload')}}" type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-admin.layout.operator_dashboard>
