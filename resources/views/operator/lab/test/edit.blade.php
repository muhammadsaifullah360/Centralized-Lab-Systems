<x-admin.layout.operator_dashboard>
    <x-slot:title>Edit | Test</x-slot:title>
    @if($message = session('message'))
        <div class="note note-success mb-4">
            {{ $message }}
        </div>
    @endif
    <div class="container py-5 ">
        <div class="row justify-content-center align-items-center">
            <div class="col-8 ">
                <div class="card-body p-4 p-md-5 text-center text-decoration-underline">
                    <h3 class="mb-4">Update Users Details </h3>
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-10">
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control"
                                           name="name"
                                           id="name" value="{{$tests->name}}" required/>
                                    <label for="name" class="form-label">
                                        Name</label>
                                    <div class="valid-feedback">Looks
                                        good!
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="price"
                                           class="form-control"
                                           name="price" value="{{$tests->price}}"/>
                                    <label class="form-label"
                                           for="form1Example1">Price
                                    </label>
                                </div>

                                <div class="form-outline mb-4">
                                    <select value="{{$tests->status}}" name="status"
                                            class="form-select mb-3">
                                        <options></options>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>

                                <div class="form-outline mb-4">
                                    <textarea class="form-control" id="description"
                                              rows="3">{{ $tests->description }}
                                    </textarea>
                                    <label class="form-label"
                                           for="description">Description</label>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-secondary" href="{{ route('tests.dashboard') }}"> Cancel</a>
                        <button type="submit" class="btn btn-primary"
                                formaction="{{route('update.test', $tests->id)}}"
                                style="margin-left: 3px">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout.operator_dashboard>


