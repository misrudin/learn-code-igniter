<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?></h1>


    <div class="row">

        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                        <th scope="col">Date Create</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datauser as $d) : ?>
                        <?php if($d['email'] !== $this->session->userdata('email')) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['email']; ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/profile/').$d['image']; ?>" style="width:30px">
                            </td>
                            <td>
                                <?= $d['role']; ?>
                            </td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modalrole" data-id="<?= $d['id']; ?>" class="badge badge-primary ubahrole">Change</a>
                            </td>
                            <td><?= date('d F Y', $d['date_create']); ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="modalrole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Change User Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
            <form action="<?= base_url('user/editrole') ?>" method="post">
                <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($role as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>