<main>
<div class="col-5 m-auto">
                <form class="p-4" action="./register-page.php" method="post" style="border: solid grey 2px; border-radius: 2%;">
                    <h3 class="mb-4">Register</h3>
                    <div class="row mb-2">
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                        <?php if (!empty($systemErrors['name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['name']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group col-6">
                        <label for="last-name">Last Name</label>
                        <input type="text" class="form-control" id="last-name" placeholder="Enter last name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
                        <?php if (!empty($systemErrors['last_name'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['last_name']); ?></small>
                        <?php } ?>
                    </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        <?php if (!empty($systemErrors['email'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['email']); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
                        <?php if (!empty($systemErrors['password'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['password']); ?></small>
                        <?php } ?>
                    </div><div class="form-group mb-2">
                        <label for="repassword">Repeat password</label>
                        <input type="password" class="form-control" id="repassword" name="repassword" value="<?php echo htmlspecialchars($repassword); ?>">
                        <?php if (!empty($systemErrors['repassword'])) { ?>
                            <small class="form-text text-danger"><?php echo htmlspecialchars($systemErrors['repassword']); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-outline-success mt-5 mb-3" name="register" value="yes">Submit</button>
                </form>
            </div>
</main>