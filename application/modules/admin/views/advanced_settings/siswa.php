<div id="siswa">
    <?php
    if ($this->session->flashdata('result_delete')) {
        ?>
        <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_delete') ?></div>
        <hr>
        <?php
    }
    if ($this->session->flashdata('result_publish')) {
        ?>
        <hr>
        <div class="alert alert-success"><?= $this->session->flashdata('result_publish') ?></div>
        <hr>
        <?php
    } 
    ?>
    <h1><img src="<?= base_url('assets/imgs/filemanager.png') ?>" class="header-img" style="margin-top:-2px;"> Siswa</h1>
    <hr><div style="margin-bottom: 20px;">
    <a href="<?= base_url('admin/newsiswa') ?>" data-toggle="modal" data-target="" class="btn btn-primary pull-left">
        <b>+</b> TAMBAH SISWA
    </a>
    
    <div class="clearfix"></div>
</div>
    <div class="row">
        <div class="col-xs-12">
            
            <hr>
            <?php
            if ($siswa) {
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
								<th>NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
								 <th>Tanggal Lahir</th>
								  <th>Kelas</th>
                               
                              
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($siswa as $row) {
                                $u_path = 'attachments/siswa/';
                                if ($row->image != null && file_exists($u_path . $row->image)) {
                                    $image = base_url($u_path . $row->image);
                                } else {
                                    $image = base_url('attachments/no-image.png');
                                }
                                ?>

                                <tr>
                                    <td width="120px">
                                        <img src="<?= $image ?>" alt="No Image" class="img-thumbnail" style="height:110px;">
                                    </td>
									 <td>
                                        <?= $row->nik ?>
                                    </td>
                                    <td>
                                        <?= $row->title ?>
                                    </td>
                                    <td>
                                        <?= $row->description ?>
                                    </td>
                                 <td width="120px">
                                        <?= $row->tanggal ?>
                                    </td>
									 <td>
                                        <?= $row->kelas ?>
                                    </td>
                                                                  
                                   
                                    <td>
                                        <div class="pull-right">
                                            <a href="<?= base_url('admin/newsiswa/' . $row->id) ?>" class="btn btn-info">Edit</a>
                                            <a href="<?= base_url('admin/siswa?delete=' . $row->id) ?>"  class="btn btn-danger confirm-delete">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?= $links_pagination ?>
            </div>
            <?php
        } else {
            ?>
            <div class ="alert alert-info">Belum ada data siswa!</div>
        <?php } ?>
    </div>