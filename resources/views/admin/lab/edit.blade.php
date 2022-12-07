<x-admin.layout.dashboard>
    <x-slot:title>Edit | Labs</x-slot:title>
    @if($message = session('message'))
        <div class="note note-success mb-4">
            {{ $message }}
        </div>
    @endif
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9  col-xl-8">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5 text-center text-decoration-underline">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Update Lab Details </h3>
                            <form method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline mb-4">
                                            <input type="text" name="name" value="{{$laboratories->name}}"
                                                   class="form-control"
                                                   id="name" required/>
                                            <label for="name" class="form-label"> Lab Name</label>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                        <!-- input -->
                                        <div class="form-outline mb-4">
                                            <input type="text" id="License Number"
                                                   value="{{ $laboratories->license_number }}"
                                                   name="license_number"
                                                   class="form-control"/>
                                            <label class="form-label" for="email">License Number
                                            </label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="contact" value="{{ $laboratories->contact }}"
                                                   name="contact"
                                                   class="form-control"/>
                                            <label class="form-label" for="email">Contact Number
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <select id="inputState" class="form-select mb-3"
                                                name="users_id">
                                            @foreach($users as $id=>$name)
                                                <option selected value="{{$id}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-outline">
                                            <textarea class="form-control"
                                                      id="textAreaExample"
                                                      rows="3" name="address">{{ $laboratories->address }}</textarea>
                                            <label class="form-label"
                                                   for="textAreaExample">Address</label>
                                        </div>

                                    </div>
                                </div>
                                <a class="btn btn-secondary" href="{{ route('admin.lab.index') }}"> Cancel</a>
                                <button type="submit" class="btn btn-primary"
                                        formaction="{{ route('update.labs', $laboratories->id) }}"
                                        style="margin-left: 3px">
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin.layout.dashboard>
