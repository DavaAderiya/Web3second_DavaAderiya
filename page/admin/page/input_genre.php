<form action="?page=genre&action=<?php echo (isset($_GET['action']) && $_GET['action'] == 'edit') ? 'update&id='.$_GET['id_genre'] : 'store'; ?>" method="POST">
  <div class="mb-3">
    <label class="form-label">Nama Genre</label>
    <input name="nama_genre" type="text" class="form-control"
      value="<?php echo isset($edit['nama_genre']) ? htmlspecialchars($edit['nama_genre'], ENT_QUOTES) : ''; ?>">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
