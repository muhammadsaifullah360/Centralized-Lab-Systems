<x-layouts.dashboard_layout>
    <x-slot:title>Edit | Users</x-slot:title>
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
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Update Users Details </h3>
                                <form method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-4">

                                            <div class="form-outline mb-4">
                                                <input type="text" name="name" value="{{ $store_users->name }}"
                                                       class="form-control"
                                                       id="name" required/>
                                                <label for="name" class="form-label">Name</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            <!-- input -->
                                            <div class="form-outline mb-4">
                                                <input type="email" id="email" value="{{ $store_users->email }}"
                                                       name="email"
                                                       class="form-control"/>
                                                <label class="form-label" for="email">Email
                                                </label>
                                            </div>
                                            <!-- input -->
                                            <div class="form-outline ">
                                                <input type="text" id="role" value="{{ $store_users->role }}"
                                                       name="role"
                                                       class="form-control"/>
                                                <label class="form-label" for="email">Role
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline mb-4">
                                                <input  value="{{ $store_users->password }}"
                                                       name="password" id="password"
                                                       class="form-control"/>
                                                <label class="form-label"
                                                       for="password">Password</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="Text" id="phone" value="{{ $store_users->phone }}"
                                                       name="phone"
                                                       class="form-control"/>
                                                <label class="form-label" for="phone">Phone
                                                    Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-secondary" href="{{ route('users.show') }}"> Cancel</a>
                                    <button type="submit" class="btn btn-primary"
                                            formaction="{{ route('update.users', $store_users->id) }}"
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
</x-layouts.dashboard_layout>


