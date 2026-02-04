<h2>Admin — Books</h2>

<div class="card p-3 mb-4">
  <h5 class="mb-3">Add Book</h5>
  <form method="post" action="<?= e(url('admin_add_book')) ?>" class="row g-2">
    <div class="col-md-4">
      <input class="form-control" name="title" placeholder="Title" required>
    </div>
    <div class="col-md-3">
      <input class="form-control" name="author" placeholder="Author" required>
    </div>
    <div class="col-md-2">
      <input class="form-control" name="isbn" placeholder="ISBN" required>
    </div>
    <div class="col-md-1">
      <input class="form-control" name="price" type="number" step="0.01" min="0" placeholder="Price" required>
    </div>
    <div class="col-md-12">
      <textarea class="form-control" name="description" rows="2" placeholder="Description"></textarea>
    </div>
    <div class="col-md-12">
      <button class="btn btn-success" type="submit">Add</button>
      <a class="btn btn-secondary" href="<?= e(url('admin')) ?>">Back</a>
    </div>
  </form>
</div>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Author</th>
      <th>Price</th>
      <th style="width:120px;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($books as $b): ?>
      <tr>
        <td><?= (int)$b['book_id'] ?></td>
        <td><?= e($b['title']) ?></td>
        <td><?= e($b['author']) ?></td>
        <td>₱<?= number_format((float)$b['price'], 2) ?></td>
        <td>
          <form method="post" action="<?= e(url('admin_delete_book')) ?>">
            <input type="hidden" name="book_id" value="<?= (int)$b['book_id'] ?>">
            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
