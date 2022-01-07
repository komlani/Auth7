<div class="right_col">

    <div class="row">

        <div class="x_panel">

            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12 text-left p-3 m-2">
                        <a href="<?php echo URL . 'book/edit/' . $book->id ?? ""  ?>" class="btn btn-sm btn-primary">
                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                        </a>
                        <a href="<?php echo URL . 'book/delete/' . $book->id ?? "" ?>" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                        </a>
                        <a href="<?php echo URL ?>book" class="btn btn-sm btn-primary">
                            <i class="fa fa-list" aria-hidden="true"></i> Return To List
                        </a>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">

                        <table class="table table-bordered">

                            <tbody>

                                <tr>
                                    <td>Title</td>
                                    <td><?php echo $book->title ?? "" ?>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>