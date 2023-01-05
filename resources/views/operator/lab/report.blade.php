<x-admin.layout.operator_dashboard>

    <main style="margin-top: 58px">
        <div class="container pt-4">
            <div class="row">
                <form action="#" method="POST" class="p-2 needs-validation" novalidate>
                    @csrf
                    <div class="card">
                        <div class="card-body py-5">
                            <div class="card-header">
                                <div class="row ">
                                    <div class="justify-content-center mb-4"><h3 class="note note-success">Upload Test Report</h3></div>
                                    <div class="col-6">

                                        <div class="form-outline mb-4">
                                            <input type="text" class="form-control" name="test"
                                                   value="{{ $app->test }}" disabled
                                                   id="name" readonly required/>
                                            <label class="form-label" for="name">Test Name</label>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="form1Example1"
                                                   class="form-control" name="price"
                                                   value=""/>
                                            <label class="form-label " for="form1Example1">Normal Value</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input name="phone" type="text" id="numberField"
                                                   value="{{ $user->phone ?? '' }}"
                                                   class="form-control" required/>
                                            <input name="user_id" value="{{ $user->id ?? ''}}" hidden></input>
                                            <label class="form-label" for="form1Example1">Resulted Value</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                                <textarea class="form-control" id="textAreaExample"
                                                          rows="3" name="address">{{ $user->address ?? '' }}</textarea>
                                            <label class="form-label"
                                                   for="address">Remarks</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input name="phone" type="text" id="numberField"
                                                   value="{{ $app->user_id ?? '' }}"
                                                   class="form-control" required/>
                                            <input name="user_id" value="{{ $user->id ?? ''}}" hidden></input>
                                            <label class="form-label" for="form1Example1">Patient Name</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input name="phone" type="text" id="numberField"
                                                   value="{{ $user->phone ?? '' }}"
                                                   class="form-control" required/>
                                            <input name="user_id" value="{{ $user->id ?? ''}}" hidden></input>
                                            <label class="form-label" for="form1Example1">Contact Number</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input name="phone" type="text" id="numberField"
                                                   value="{{ $user->phone ?? '' }}"
                                                   class="form-control" required/>
                                            <input name="user_id" value="{{ $user->id ?? ''}}" hidden></input>
                                            <label class="form-label" for="form1Example1">Contact Number</label>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('appointment') }}" type="button" class="btn btn-danger"> Cancel</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
    </main>


</x-admin.layout.operator_dashboard>
