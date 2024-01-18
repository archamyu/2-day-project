<body style="background: #16191e; color: white" class="row">
    <form class="position-absolute top-50 start-50 translate-middle d-flex flex-column align-items-center col-2" method="post" action="<?= base_url('auth/registration') ?>">
        <div class="form-outline mb-4 w-100">
            <label class="form-label" for="form2Example1">Username</label>
            <input type="text" id="form2Example1" class="form-control" name="username" />
            <?= form_error('username', '<div style="color: #FF1C1C; font-size: 13px; text-align: left;">', '</div>'); ?>
        </div>
        <div class="form-outline mb-4 w-100">
            <label class="form-label" for="form2Example2">Password</label>
            <input type="password" id="form2Example2" class="form-control" name="password" />
        </div>
        <div class="form-outline mb-4 w-100">
            <label class="form-label" for="form2Example3">Repeat Password</label>
            <input type="password" id="form2Example3" class="form-control" name="password2" />
            <?= form_error('password', '<div style="color: #FF1C1C; font-size: 13px; text-align: left;">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Register</button>

        <div class="text-center">
            <p>Already have an account? <a href="<?= base_url('auth') ?>">Login</a></p>
        </div>
    </form>
</body>