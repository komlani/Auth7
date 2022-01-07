<div class="right_col">

    <div class="row">

        <div class="x_panel">

            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12 text-left p-3 m-2">
                        <a href="<?php echo URL ?>book/create" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New book
                        </a>
                    </div>
                </div>

                <div class="row">

                    <?php if (isset($_SESSION['deleted'])) : ?>
                        <div class="col-md-12 alert alert-info alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            Item deleted.
                        </div>
                    <?php endif; ?>

                </div>

                <div class="row">

                    <div class="col-sm-12">

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($books as $book) : ?>
                                    <tr>
                                        <td><?php echo $book->title ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo URL . 'book/show/' . $book->id ?>" class="btn btn-primary btn-sm btn-xs"><i class="fa fa-eye"></i> View </a>
                                            <a href="<?php echo URL . 'book/edit/' . $book->id  ?>" class="btn btn-info btn-sm btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="<?php echo URL . 'book/delete/' . $book->id ?>" class="btn btn-danger btn-sm btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php

unset(
    $_SESSION['deleted'],
);
