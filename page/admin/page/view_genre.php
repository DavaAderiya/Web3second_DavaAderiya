<div class="row">
    <table class="table table-hover table-border mb-0">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Action</td>
        </tr>
         <?php
                            if(isset($genres)){
                                foreach($genres as $genre){
                            ?>
                                <tr>
                                    <td><?= $genre['id_genre'] ?></td>
                                    <td><?= $genre['nama_genre'] ?></td>
									<td><a href="?page=genre&action=edit&id=<?= $genre['id_genre'] ?>">Edit</a></td>
									<td><a href="?page=genre&action=delete&id=<?= $genre['id_genre'] ?>">Hapus</a></td>
                                </tr>
                            <?php }
                            } else { ?>
                                <tr>
                                    <td class="text-center" colspan="2">Data Kosong</td>
                                </tr>
                            <?php } ?>
    </table>
</div>