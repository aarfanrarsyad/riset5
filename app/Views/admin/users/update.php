<?php

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Management Users</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                          <li class="breadcrumb-item"><a href="<?= base_url('/management-users') ?>">Management Users</a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>

      <?php
        $inputs = session()->getFlashdata('inputs');
        $errors = session()->getFlashdata('errors');
        $success = session()->getFlashdata('success');
        $failed = session()->getFlashdata('failed');
        ?>

      <section class="content">
          <div class="container-fluid">
              <?php if (!empty($errors)) : ?>
                  <div class="alert alert-danger" role="alert">
                      Whoops! There was an error when inputting data :
                      <ul>
                          <?php foreach ($errors as $error) : ?>
                              <li><?= esc($error) ?></li>
                          <?php endforeach ?>
                      </ul>
                  </div>
              <?php elseif (!empty($success)) : ?>
                  <div class="alert alert-success" role="alert">
                      Success! User data has been successfully registered.
                  </div>
              <?php elseif (!empty($failed)) : ?>
                  <div class="alert alert-danger" role="alert">
                      Failed! User data was not registered successfully.
                  </div>
              <?php endif; ?>
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <h5 class="card-title">Table Users</h5>
                              <div class="card-tools">
                              </div>
                          </div>
                          <div class="card-body">
                              <form action="" method="POST">
                                  <div class="form-group">
                                      <label for="username">Username</label>
                                      <input type="text" class="form-control form-control-sm" name="username" id="username" placeholder="Create username" value="<?= $data['username'] ?>">
                                  </div>
                                  <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Create your password">
                                  </div>
                                  <div class="form-group">
                                      <label for="confirm-password">Confirm Password</label>
                                      <input type="password" class="form-control form-control-sm" name="confirm_password" id="confirm-password" placeholder="Confirm password">
                                  </div>
                                  <br>
                                  <p>Is this user active?</p>
                                  <?php
                                    if ($data['active'] == 1) {
                                        $checked1 = 'checked';
                                        $checked0 = '';
                                    } else {
                                        $checked1 = '';
                                        $checked0 = 'checked';
                                    }
                                    ?>
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="active" id="is_active" value="1" <?= $checked1 ?>>
                                      <label class="form-check-label" for="is_active">
                                          Active
                                      </label>
                                  </div>
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="active" id="is_inactive" value="0" <?= $checked0 ?>>
                                      <label class="form-check-label" for="is_inactive">
                                          Not Active
                                      </label>
                                  </div>
                                  <br>
                                  <p>Please Select User Role</p>
                                <?php foreach($groups as $group) :?>
                                <?php if (search_array_2($groups_selected, 'group_id', $group['group_id']) !== false) :?>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" name="group[]" type="checkbox" id="group-<?= $group['group_id']?>" value="<?= $group['group_id']?>" checked>
                                      <label class="form-check-label" for="group-<?= $group['group_id']?>"><?= $group['name_group']?></label>
                                  </div>
                                <?php else : ?>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" name="group[]" type="checkbox" id="group-<?= $group['group_id']?>" value="<?= $group['group_id']?>">
                                      <label class="form-check-label" for="group-<?= $group['group_id']?>"><?= $group['name_group']?></label>
                                  </div>
                                <?php endif ;?>
                                <?php endforeach; ;?>
                                  <br>
                                  <br>
                                  <button type="submit" name="insert_user" class="btn btn-sm btn-primary">Submit</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>