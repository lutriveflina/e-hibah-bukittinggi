    <div class="col-lg-6">
        <div class="card-body p-4 p-sm-5">
            <h5 class="card-title">Sign In</h5>
            <p class="card-text mb-5">untuk melakukan aktivitas anda</p>
            <div class="row g-3">
                <div class="col-12">
                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <input wire:model='email' type="email" class="form-control radius-30 ps-5"
                            id="inputEmailAddress" placeholder="Email Address">
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputChoosePassword" class="form-label">Enter
                        Password</label>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                        <input wire:model='password' type="password" class="form-control radius-30 ps-5"
                            id="inputChoosePassword" placeholder="Enter Password">
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-check form-switch">
                        <input wire:model='remember' class="form-check-input" type="checkbox"
                            id="flexSwitchCheckChecked" checked="true">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                    </div>
                </div>
                <div class="col-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button wire:click='authenticate()' class="btn btn-primary radius-30">Sign
                            In</button>
                    </div>
                </div>
                <div class="col-12">
                    <p class="mb-0">Don't have an account yet? <a href="authentication-signup.html">Sign up
                            here</a></p>
                </div>
            </div>
        </div>
    </div>
