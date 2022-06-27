<main>
<div class="col-5 m-auto">
                <form class="p-4" action="./login-page.php" method="post" style="border: solid grey 2px; border-radius: 3%;">
                    <h3 class="mb-4">Log In</h3>
                    <div class="form-group mb-2">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        <?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo htmlspecialchars($password); ?>">
                        <?php if (!empty($systemErrors['password'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['password']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="row p-3">
                        <button type="submit" class="btn btn-outline-success mt-3 col-2" name="login" value="yes">Submit</button>
                        <div class="col-5"></div>
                        <p class="col pt-3 mt-2">Don't have account?
                            <a href="./register-page.php" class="link-dark">Register</a>
                        </p>
                    </div>
                </form>
            </div>
</main>