<!-- <h2><?= esc($title); ?></h2> -->

<?= \Config\Services::validation()->listErrors(); ?>

<!-- <form action="/entries/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="body">Text</label>
    <textarea name="body"></textarea><br />

    <input type="submit" name="submit" value="Create new entry" />

</form> -->

<form action="/entries/create" method="post">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="input" class="form-control" id="title" name="title">
  </div>

  <div class="form-group">
    <label for="body">Create new entry</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
  </div>

  <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
</form>